<?php

namespace Tnapf\Spotify\Abstractions\Common;

class Pages
{
    public string $href;
    public int $limit;
    public ?string $next;
    public int $offset;
    public ?string $previous;
    public int $total;
}