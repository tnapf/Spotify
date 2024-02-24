<?php

namespace Tnapf\Spotify\Rest;

use Tnapf\Spotify\Abstractions\Artist\Artist;
use Tnapf\Spotify\Abstractions\Track\Track;
use Tnapf\Spotify\Enums\Method;
use Tnapf\Spotify\Abstractions\Artist\Albums;

class Artists extends RestBase
{
    public function get(string $id): Artist
    {
        return $this->http->mapRequest(
            Artist::class,
            Method::GET,
            Endpoint::bind(Endpoint::ARTISTS_ID, compact('id')),
            headers: $this->http->mergeHeaders()
        );
    }

    /** @return Artist[] */
    public function getSeveral(array $ids): array
    {
        $ids = implode(',', $ids);

        return $this->http->mapArrayRequest(
            Artist::class,
            Method::GET,
            Endpoint::bind(Endpoint::ARTISTS, getParams: compact('ids')),
            headers: $this->http->mergeHeaders(),
            callback: static fn (array $data) => $data['artists']
        );
    }

    public function getAlbums(string $id, array $includeGroups = [], ?string $market = null, int $limit = 20, int $offset = 0): Albums
    {
        if ($limit > 50) {
            throw new \InvalidArgumentException('Limit cannot be greater than 50');
        } elseif ($limit < 1) {
            throw new \InvalidArgumentException('Limit cannot be less than 1');
        }

        if ($offset < 0) {
            throw new \InvalidArgumentException('Offset cannot be less than 0');
        }

        $getParams = compact('limit', 'offset');

        if (!empty($includeGroups)) {
            $getParams['include_groups'] = implode(',', $includeGroups);
        }

        return $this->http->mapRequest(
            Albums::class,
            Method::GET,
            Endpoint::bind(Endpoint::ARTISTS_ID_ALBUMS, compact('id'), $getParams, $market),
            headers: $this->http->mergeHeaders()
        );
    }

    /** @return Track[] */
    public function getTopTracks(string $id, string $market = 'US'): array
    {
        return $this->http->mapArrayRequest(
            Track::class,
            Method::GET,
            Endpoint::bind(Endpoint::ARTISTS_ID_TOP_TRACKS, compact('id'), market: $market),
            headers: $this->http->mergeHeaders(),
            callback: static fn (array $data) => $data['tracks']
        );
    }

    /** @return Artist[] */
    public function getRelatedArtists(string $id): array
    {
        return $this->http->mapArrayRequest(
            Artist::class,
            Method::GET,
            Endpoint::bind(Endpoint::ARTISTS_ID_RELATED_ARTISTS, compact('id')),
            headers: $this->http->mergeHeaders(),
            callback: static fn (array $data) => $data['artists']
        );
    }
}
