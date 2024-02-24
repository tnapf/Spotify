<?php

namespace Tnapf\Spotify\Abstractions\Album;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\Spotify\Abstractions\Common\Pages;
use Tnapf\Spotify\Abstractions\Track\SimplifiedTrack;

class Tracks extends Pages
{
    /** @var SimplifiedTrack[] */
    #[ObjectArrayType(name: 'items', class: SimplifiedTrack::class)]
    public array $items;
}
