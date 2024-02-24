<?php

namespace Tnapf\Spotify\Abstractions\Audiobook;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;

class Chapters
{
    public string $href;
    public int $limit;
    public ?string $next;
    public int $offset;
    public ?string $previous;
    public int $total;

    #[ObjectArrayType('items', SimplifiedChapter::class)]
    public array $items;
}
