<?php

namespace Tnapf\Spotify\Abstractions\Artist;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;
use Tnapf\Spotify\Abstractions\Common\Image;

#[SnakeToCamelCase]
class Artist
{
    public ExternalUrls $externalUrls;
    public ?Followers $followers;

    #[PrimitiveArrayType(name: 'genres', type: PrimitiveType::STRING, nullable: true)]
    public array $genres;

    #[ObjectArrayType(name: 'images', class: Image::class, nullable: true)]
    public array $images;

    public string $name;
    public ?int $popularity;
    public string $type;
    public string $uri;
}
