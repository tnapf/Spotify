<?php

namespace Tnapf\Spotify\Rest;

use Tnapf\Spotify\Abstractions\Album\Album;
use Tnapf\Spotify\Enums\Method;
use Tnapf\Spotify\Http;

class Albums extends RestBase
{
    public function get(string $id): Album
    {
        return $this->http->mapRequest(
            Album::class,
            Method::GET,
            Http::BASE_URI."/albums/{$id}",
            headers: $this->http->mergeHeaders()
        );
    }

    /** @return Album[] */
    public function getSeveral(string ...$ids): array
    {
        return $this->http->arrayMapRequest(
            Album::class,
            Method::GET,
            Http::BASE_URI.'/albums?'.http_build_query(['ids' => implode(',', $ids)], '', '&'),
            headers: $this->http->mergeHeaders(),
            callback: static fn (array $array): array => $array['albums']
        );
    }
}
