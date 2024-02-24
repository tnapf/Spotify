<?php

namespace Tnapf\Spotify\Abstractions\Playlist;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\Spotify\Abstractions\Common\Pages;

class SimplifiedPlaylists extends Pages
{
    /** @var SimplifiedPlaylist[] */
    #[ObjectArrayType(name: 'items', class: SimplifiedPlaylist::class)]
    public array $items;
}