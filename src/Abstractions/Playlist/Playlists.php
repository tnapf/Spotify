<?php

namespace Tnapf\Spotify\Abstractions\Playlist;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\Spotify\Abstractions\Common\Pages;

class Playlists extends Pages
{
    /** @var Playlist[] */
    #[ObjectArrayType(name: 'items', class: Playlist::class)]
    public array $items;
}