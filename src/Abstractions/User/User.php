<?php

namespace Tnapf\Spotify\Abstractions\User;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;
use Tnapf\Spotify\Abstractions\Artist\ExternalUrls;
use Tnapf\Spotify\Abstractions\Common\Image;
use Tnapf\Spotify\Abstractions\Playlist\Followers;

#[SnakeToCamelCase]
class User
{
    public ?string $country;
    public ?string $displayName;
    public ?string $email;
    public ?ExplicitContent $explicitContent;
    public ExternalUrls $externalUrls;
    public ?Followers $followers;
    public string $href;
    public string $id;
    public string $type;
    public string $uri;

    /** @var Image[] */
    #[ObjectArrayType(name: 'images', class: Image::class, nullable: true)]
    public ?array $images;
}
