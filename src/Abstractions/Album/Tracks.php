<?php

namespace Tnapf\Spotify\Abstractions\Album;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\Spotify\Abstractions\Tracks\SimplifiedTrack;

class Tracks
{
    public string $href;
    public int $limit;
    public ?string $next;
    public int $offset;
    public ?string $previous;
    public int $total;

    /** @var SimplifiedTrack[] */
    #[ObjectArrayType(name: 'items', class: SimplifiedTrack::class)]
    public array $items;
}
