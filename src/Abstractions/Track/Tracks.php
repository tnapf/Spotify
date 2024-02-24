<?php

namespace Tnapf\Spotify\Abstractions\Track;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\Spotify\Abstractions\Common\Pages;

class Tracks extends Pages
{
    /** @var Track[] */
    #[ObjectArrayType(name: 'items', class: Track::class)]
    public array $items;
}