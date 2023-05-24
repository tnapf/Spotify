<?php

namespace Tnapf\Spotify\Abstractions\Common;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;
use Tnapf\Spotify\Abstractions\Artist\ExternalUrls;

#[SnakeToCamelCase]
class LinkedFrom
{
    public ExternalUrls $externalUrls;
    public string $href;
    public string $id;
    public string $type;
    public string $uri;
}
