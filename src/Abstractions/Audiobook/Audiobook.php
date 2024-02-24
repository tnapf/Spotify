<?php

namespace Tnapf\Spotify\Abstractions\Audiobook;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;
use Tnapf\Spotify\Abstractions\Artist\Artist;
use Tnapf\Spotify\Abstractions\Artist\ExternalUrls;
use Tnapf\Spotify\Abstractions\Common\Copyright;
use Tnapf\Spotify\Abstractions\Common\Image;

#[SnakeToCamelCase]
class Audiobook
{
    #[ObjectArrayType('artists', Artist::class, true)]
    public ?array $artists;

    #[PrimitiveArrayType('availableMarkets', PrimitiveType::STRING)]
    public array $availableMarkets;

    #[ObjectArrayType('copyrights', Copyright::class)]
    public array $copyrights;

    public string $description;
    public string $htmlDescription;
    public ?string $edition;
    public bool $explicit;
    public ExternalUrls $externalUrls;
    public string $href;
    public string $id;

    #[ObjectArrayType('images', Image::class)]
    public array $images;

    #[PrimitiveArrayType('languages', PrimitiveType::STRING)]
    public array $languages;

    public string $mediaType;
    public string $name;

    #[ObjectArrayType('narrators', Narrator::class)]
    public array $narrators;

    public string $publisher;
    public string $type;
    public string $uri;
    public int $totalChapters;
    public Chapters $chapters;
}
