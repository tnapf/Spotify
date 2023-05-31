<?php

namespace Tnapf\Spotify;

use Tnapf\Spotify\Rest\Albums;
use Tnapf\Spotify\Rest\Artists;
use Tnapf\Spotify\Rest\Playlists;
use Tnapf\Spotify\Rest\Tracks;

/**
 * @property-read Http $http
 * @property-read Albums $albums
 * @property-read Tracks $tracks
 * @property-read Artists $artists
 * @property-read Playlists $playlists
 */
class Client
{
    private array $rest = [];

    public function __construct(public readonly Http $http)
    {
    }

    public function __get(string $name): mixed
    {
        $public = ['http'];

        if (in_array($name, $public)) {
            return $this->$name;
        }

        $rest = [
            'albums' => Albums::class,
            'tracks' => Tracks::class,
            'artists' => Artists::class,
            'playlists' => Playlists::class,
        ];

        if (!isset($rest[$name])) {
            return null;
        }

        if (!isset($this->rest[$name])) {
            $this->rest[$name] = new $rest[$name]($this->http);
        }

        return $this->rest[$name];
    }
}
