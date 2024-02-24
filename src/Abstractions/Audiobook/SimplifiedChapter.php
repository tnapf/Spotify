<?php

namespace Tnapf\Spotify\Abstractions\Audiobook;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;
use Tnapf\Spotify\Abstractions\Artist\ExternalUrls;
use Tnapf\Spotify\Abstractions\Common\Image;
use Tnapf\Spotify\Abstractions\Common\Restrictions;

#[SnakeToCamelCase]
class SimplifiedChapter
{
    public ?string $audioPreviewUrl;

    #[PrimitiveArrayType('availableMarkets', PrimitiveType::STRING, true)]
    public ?array $availableMarkets;

    public int $chapterNumber;
    public string $description;
    public string $htmlDescription;
    public int $durationMs;
    public bool $explicit;
    public ExternalUrls $externalUrls;
    public string $href;
    public string $id;

    #[ObjectArrayType('images', Image::class)]
    public array $images;

    public ?bool $isPlayable;

    #[PrimitiveArrayType('languages', PrimitiveType::STRING, true)]
    public array $languages;

    public string $name;
    public string $releaseDate;
    public string $releaseDatePrecision;
    public string $type;
    public string $uri;
    public ?Restrictions $restrictions;
}
