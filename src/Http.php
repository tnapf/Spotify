<?php

namespace Tnapf\Spotify;

use Closure;
use HttpSoft\Message\ServerRequest;
use HttpSoft\Message\Stream;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use ReflectionException;
use Throwable;
use Tnapf\JsonMapper\MapperException;
use Tnapf\Spotify\Abstractions\Authorization\AccessToken;
use Tnapf\Spotify\Abstractions\Authorization\Scope;
use Tnapf\Spotify\Abstractions\Errors\AuthenticationError;
use Tnapf\Spotify\Abstractions\Errors\Error;
use Tnapf\Spotify\Enums\Method;
use Tnapf\Spotify\Exceptions\HttpException;
use Tnapf\JsonMapper\MapperInterface;
use ValueError;

class Http
{
    protected AccessToken $token;

    public const BASE_URI = 'https://api.spotify.com/v1';

    /**
     * @throws Throwable
     */
    public function __construct(
        protected readonly ClientInterface $http,
        protected readonly MapperInterface $mapper,
        protected readonly string $id,
        protected readonly string $secret
    ) {
        $this->withAccessToken($this->getAuthenticationToken());
    }

    public function withAccessToken(AccessToken $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function getAuthenticationToken(): AccessToken
    {
        return $this->mapRequest(
            AccessToken::class,
            Method::POST,
            'https://accounts.spotify.com/api/token',
            "grant_type=client_credentials&client_id={$this->id}&client_secret={$this->secret}",
            [
                'content-type' => 'application/x-www-form-urlencoded',
                'authorization' => 'Basic ' . base64_encode("{$this->id}:{$this->secret}"),
            ]
        );
    }

    public function requestUserAuthorization(string $redirectUri, array $scopes = []): string
    {
        foreach ($scopes as $scope) {
            if (!$scope instanceof Scope) {
                throw new ValueError('Scopes must be an instance of ' . Scope::class);
            }
        }

        $scopes = array_map(static fn (Scope $scope) => $scope->value, $scopes);
        $base = 'https://accounts.spotify.com/authorize';
        $query = http_build_query([
            'client_id' => $this->id,
            'response_type' => 'code',
            'redirect_uri' => $redirectUri,
            'scope' => implode(' ', $scopes),
        ]);

        return "{$base}?{$query}";
    }

    public function requestUserAccessToken(string $code, string $redirectUri): AccessToken
    {
        return $this->mapRequest(
            AccessToken::class,
            Method::POST,
            'https://accounts.spotify.com/api/token',
            http_build_query([
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => $redirectUri,
            ]),
            [
                'authorization' => 'Basic ' . base64_encode("{$this->id}:{$this->secret}"),
                'content-type' => 'application/x-www-form-urlencoded',
            ]
        );
    }

    public function requestRefreshedAccessToken(string $refreshToken): AccessToken
    {
        return $this->mapRequest(
            AccessToken::class,
            Method::POST,
            'https://accounts.spotify.com/api/token',
            http_build_query([
                'grant_type' => 'refresh_token',
                'refresh_token' => $refreshToken,
            ]),
            [
                'authorization' => 'Basic ' . base64_encode("{$this->id}:{$this->secret}"),
                'content-type' => 'application/x-www-form-urlencoded',
            ]
        );
    }

    /**
     * @template T
     *
     * @param class-string<T> $class
     *
     * @return T
     */
    public function mapRequest(string $class, Method $method, string $uri, ?string $body = null, array $headers = []): mixed
    {
        $response = $this->request($method, $uri, $body, $headers);

        return $this->mapper->map($class, json_decode($response->getBody()->getContents(), true));
    }

    /**
     * @template T
     *
     * @param class-string<T> $class
     * @param Method $method
     * @param string $uri
     * @param string|null $body
     * @param array $headers
     * @param Closure|null $callback You can modify the array before the loop to map it
     *
     * @return T[]
     */
    public function mapArrayRequest(string $class, Method $method, string $uri, ?string $body = null, array $headers = [], ?Closure $callback = null): array
    {
        $response = $this->request($method, $uri, $body, $headers);
        $mapped = [];

        $json = json_decode($response->getBody()->getContents(), true);

        $json = $callback !== null ? $callback($json) : $json;

        foreach ($json as $item) {
            $mapped[] = $this->mapper->map($class, $item);
        }

        return $mapped;
    }

    /**
     * @throws HttpException
     * @throws ReflectionException
     * @throws MapperException
     */
    protected function throwIfNotOkay(ResponseInterface $response): void
    {
        if ($response->getStatusCode() === 200) {
            return;
        }

        $json = json_decode($response->getBody()->getContents(), true);

        if ($json === null) {
            return;
        }

        if (isset($json['error']['status'])) {
            $error = $this->mapper->map(Error::class, $json['error']);
        } else {
            $error = $this->mapper->map(AuthenticationError::class, $json);
        }

        throw new HttpException($error);
    }

    public function request(Method $method, string $uri, ?string $body = null, array $headers = []): ResponseInterface
    {
        if ($method !== Method::GET) {
            $bodyStream = new Stream();
            $bodyStream->write($body ?? '');
        }

        $request = new ServerRequest(method: $method->value, uri: $uri, headers: $headers, body: $bodyStream ?? null);

        $response = $this->http->sendRequest($request);

        $this->throwIfNotOkay($response);

        return $response;
    }

    public function mergeHeaders(array $headers = []): array
    {
        $existingHeaders = [
            'Authorization' => "{$this->token->tokenType} {$this->token->accessToken}",
        ];

        return [...$existingHeaders, ...$headers];
    }
}
