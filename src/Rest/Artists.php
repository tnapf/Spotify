<?php

namespace Tnapf\Spotify\Rest;

use Tnapf\Spotify\Abstractions\Artist\Artist;
use Tnapf\Spotify\Enums\Method;

class Artists extends RestBase
{
    public function get(string $id): Artist
    {
        return $this->http->mapRequest(
            Artist::class,
            Method::GET,
            Endpoint::bind(Endpoint::GET_ARTIST, compact('id')),
            headers: $this->http->mergeHeaders()
        );
    }
}
