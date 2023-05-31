<?php

namespace Tnapf\Spotify\Abstractions\Playlist;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;

class Tracks
{
    public string $href;
    public int $limit;
    public ?string $next;
    public int $offset;
    public ?string $previous;
    public int $total;

    /** @var Track[] */
    #[ObjectArrayType(name: 'items', class: Track::class)]
    public array $items;
}
