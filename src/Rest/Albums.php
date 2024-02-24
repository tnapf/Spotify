<?php

namespace Tnapf\Spotify\Rest;

use InvalidArgumentException;
use Tnapf\Spotify\Abstractions\Album\Album;
use Tnapf\Spotify\Abstractions\Album\Tracks;
use Tnapf\Spotify\Enums\Method;

class Albums extends RestBase
{
    /** @see https://developer.spotify.com/documentation/web-api/reference/get-an-album */
    public function get(string $id, ?string $market = null): Album
    {
        return $this->http->mapRequest(
            Album::class,
            Method::GET,
            Endpoint::bind(Endpoint::ALBUMS_ID, compact('id'), market: $market),
            headers: $this->http->mergeHeaders()
        );
    }

    /**
     * @see https://developer.spotify.com/documentation/web-api/reference/get-multiple-albums
     *
     * @return Album[]
     */
    public function getSeveral(array $ids, ?string $market = null): array
    {
        $ids = implode(',', $ids);

        return $this->http->mapArrayRequest(
            Album::class,
            Method::GET,
            Endpoint::bind(Endpoint::ALBUMS, [], compact('ids'), market: $market),
            headers: $this->http->mergeHeaders(),
            callback: static fn (array $array): array => $array['albums']
        );
    }

    /** @see https://developer.spotify.com/documentation/web-api/reference/get-an-albums-tracks */
    public function getTracks(string $id, int $limit = 20, int $offset = 0, ?string $market = null): Tracks
    {
        if ($limit > 50) {
            throw new InvalidArgumentException('Limit cannot be greater than 50');
        } elseif ($limit < 0) {
            throw new InvalidArgumentException('Limit cannot be less than 0');
        }

        if ($offset < 0) {
            throw new InvalidArgumentException('Offset cannot be less than 0');
        }

        return $this->http->mapRequest(
            Tracks::class,
            Method::GET,
            Endpoint::bind(Endpoint::ALBUMS_ID_TRACKS, compact('id'), compact('limit', 'offset'), market: $market),
            headers: $this->http->mergeHeaders()
        );
    }
}
