<?php

namespace Tnapf\Spotify\Abstractions\Artist;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class SimplifiedArtist
{
    public ExternalUrls $externalUrls;
    public string $href;
    public string $id;
    public string $name;
    public string $type;
    public string $uri;
}
