<?php

namespace Tnapf\Spotify;

use Tnapf\Spotify\Rest\Albums;
use Tnapf\Spotify\Rest\Tracks;

class Client
{
    public readonly Tracks $tracks;
    public readonly Albums $albums;

    public function __construct(public readonly Http $http)
    {
        $this->tracks = new Tracks($this->http);
        $this->albums = new Albums($this->http);
    }
}
