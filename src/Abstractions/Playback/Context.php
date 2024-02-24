<?php

namespace Tnapf\Spotify\Abstractions\Playback;

use Tnapf\Spotify\Abstractions\Artist\ExternalUrls;

class Context
{
    public ContentType $type;
    public string $href;
    public ?ExternalUrls $externalUrls;
    public string $uri;
}