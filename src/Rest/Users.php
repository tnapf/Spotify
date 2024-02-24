<?php

namespace Tnapf\Spotify\Rest;

use Tnapf\Spotify\Abstractions\User\TopItemTimeRange;
use Tnapf\Spotify\Abstractions\User\TopItemType;
use Tnapf\Spotify\Abstractions\User\User;
use Tnapf\Spotify\Enums\Method;
use Tnapf\Spotify\Abstractions\Artist\Artists;
use \Tnapf\Spotify\Abstractions\Track\Tracks;

class Users extends RestBase
{
    public function getCurrentProfile(): User
    {
        return $this->http->mapRequest(
            User::class,
            Method::GET,
            Endpoint::bind(Endpoint::USERS_ME),
            headers: $this->http->mergeHeaders()
        );
    }

    public function getTopItems(TopItemType $type, TopItemTimeRange $timeRange = TopItemTimeRange::MEDIUM_TERM, int $limit = 20, int $offset = 0): Tracks|Artists
    {
        $class = match($type) {
            TopItemType::TRACKS => Tracks::class,
            TopItemType::ARTISTS => Artists::class,
        };

        $url = match($type) {
            TopItemType::TRACKS => Endpoint::USERS_ME_TOP_TRACKS,
            TopItemType::ARTISTS => Endpoint::USERS_ME_TOP_ARTISTS,
        };

        $time_range = $timeRange->value;

        return $this->http->mapRequest(
            $class,
            Method::GET,
            Endpoint::bind($url, getParams: compact('time_range', 'limit', 'offset')),
            headers: $this->http->mergeHeaders()
        );
    }
}