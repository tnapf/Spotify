<?php

namespace Tnapf\Spotify\Abstractions\Artist;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\Spotify\Abstractions\Album\SimplifiedAlbum;

class Albums
{
    public string $href;
    public int $limit;
    public ?string $next;
    public int $offset;
    public ?string $previous;
    public int $total;

    #[ObjectArrayType(name: 'items', class: SimplifiedAlbum::class)]
    public array $items;
}
