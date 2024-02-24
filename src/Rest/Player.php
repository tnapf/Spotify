<?php

namespace Tnapf\Spotify\Rest;

use Tnapf\Spotify\Abstractions\Playback\State;
use Tnapf\Spotify\Enums\Method;

class Player extends RestBase
{
    public function getState(): ?State
    {
        // string $class, Method $method, string $uri, ?string $body = null, array $headers = []

        $request = $this->http->request(
            Method::GET,
            Endpoint::bind(Endpoint::USERS_ME_PLAYBACK),
            headers: $this->http->mergeHeaders()
        );

        $body = json_decode($request->getBody()->getContents(), true);

        if (!$body) {
            return null;
        }

        return map(State::class, $body);
    }
}