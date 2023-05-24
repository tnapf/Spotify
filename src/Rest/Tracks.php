<?php

namespace Tnapf\Spotify\Rest;

use Tnapf\Spotify\Abstractions\Track;
use Tnapf\Spotify\Enums\Method;
use Tnapf\Spotify\Http;

class Tracks extends RestBase
{
    public function getTrack(string $id): Track
    {
        return $this->http->mapRequest(
            Track::class,
            Method::GET,
            Http::BASE_URI."tracks/{$id}",
            headers: $this->http->mergeHeaders()
        );
    }
}
