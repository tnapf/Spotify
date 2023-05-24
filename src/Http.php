<?php

namespace Tnapf\Spotify;

use Closure;
use HttpSoft\Message\ServerRequest;
use HttpSoft\Message\Stream;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;
use Tnapf\Spotify\Abstractions\Authorization\AccessToken;
use Tnapf\Spotify\Abstractions\Errors\AuthenticationError;
use Tnapf\Spotify\Abstractions\Errors\Error;
use Tnapf\Spotify\Enums\Method;
use Tnapf\Spotify\Exceptions\HttpException;
use Tnapf\JsonMapper\MapperInterface;

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
        $this->token = $this->getAuthenticationToken();
    }

    public function getAuthenticationToken(): AccessToken
    {
        return $this->mapRequest(
            AccessToken::class,
            Method::POST,
            'https://accounts.spotify.com/api/token',
            'grant_type=client_credentials',
            [
                'content-type' => 'application/x-www-form-urlencoded',
                'authorization' => 'Basic '.base64_encode("{$this->id}:{$this->secret}"),
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
     * @param Closure(array): array $callback You can modify the array before the loop to map it
     *
     * @return T[]
     */
    public function arrayMapRequest(string $class, Method $method, string $uri, ?string $body = null, array $headers = [], ?Closure $callback = null): array
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

    protected function throwIfNotOkay(ResponseInterface $response): void
    {
        if ($response->getStatusCode() === 200) {
            return;
        }

        $json = json_decode($response->getBody()->getContents(), true);

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
