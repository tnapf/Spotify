<?php

namespace Tnapf\Spotify;

use Tnapf\Spotify\Rest\Albums;
use Tnapf\Spotify\Rest\Artists;
use Tnapf\Spotify\Rest\Audiobooks;
use Tnapf\Spotify\Rest\Player;
use Tnapf\Spotify\Rest\Playlists;
use Tnapf\Spotify\Rest\Tracks;
use Tnapf\Spotify\Rest\Users;

/**
 * @property-read Http $http
 * @property-read Albums $albums
 * @property-read Tracks $tracks
 * @property-read Artists $artists
 * @property-read Playlists $playlists
 * @property-read Audiobooks $audiobooks
 * @property-read Users $users
 * @property-read Player $player
 */
class Client
{
    private array $rest = [];

    public function __construct(public readonly Http $http)
    {
    }

    public function __get(string $name): mixed
    {
        if ($name === 'http') {
            return $this->http;
        }

        $rest = [
            'albums' => Albums::class,
            'tracks' => Tracks::class,
            'artists' => Artists::class,
            'playlists' => Playlists::class,
            'audiobooks' => Audiobooks::class,
            'users' => Users::class,
            'player' => Player::class
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
