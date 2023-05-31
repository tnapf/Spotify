<?php

namespace Tnapf\Spotify\Abstractions\Users;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;
use Tnapf\Spotify\Abstractions\Artist\ExternalUrls;
use Tnapf\Spotify\Abstractions\Playlist\Followers;

#[SnakeToCamelCase]
class User
{
    public ExternalUrls $externalUrls;
    public ?Followers $followers;
    public string $href;
    public string $id;
    public string $type;
    public string $uri;
    public ?string $displayName;
}
