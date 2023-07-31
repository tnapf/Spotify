<?php

namespace Tnapf\Spotify\Rest;

use Tnapf\Spotify\Abstractions\Playlist\Playlist;
use Tnapf\Spotify\Enums\Method;

class Playlists extends RestBase
{
    public function get(string $id, ?string $market = null, ?string $fields = null, ?string $additionalTypes = null): Playlist
    {
        return $this->http->mapRequest(
            Playlist::class,
            Method::GET,
            Endpoint::bind(Endpoint::PLAYLISTS_ID, compact('id'), compact('fields', 'additionalTypes'), market: $market),
            headers: $this->http->mergeHeaders()
        );
    }

    public function changeDetails(string $id, ?string $name = null, ?bool $public = null, ?bool $collaborative = null, ?string $description = null): bool
    {
        $body = array_filter(
            compact('name', 'public', 'collaborative', 'description'),
            static fn ($value) => $value !== null
        );

        $this->http->request(
            Method::PUT,
            Endpoint::bind(Endpoint::PLAYLISTS_ID, compact('id')),
            body: json_encode($body),
            headers: $this->http->mergeHeaders()
        );
    }
}
