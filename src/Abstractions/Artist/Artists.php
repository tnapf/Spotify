<?php

namespace Tnapf\Spotify\Abstractions\Artist;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\Spotify\Abstractions\Common\Pages;

class Artists extends Pages
{
    /** @var Artist[] */
    #[ObjectArrayType(name: 'items', class: Artist::class)]
    public array $items;
}