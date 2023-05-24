<?php

namespace Tnapf\Spotify\Abstractions\Album;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;
use Tnapf\Spotify\Abstractions\Artist\ExternalUrls;
use Tnapf\Spotify\Abstractions\Artist\SimplifiedArtist;
use Tnapf\Spotify\Abstractions\Common\Copyright;
use Tnapf\Spotify\Abstractions\Common\ExternalIds;
use Tnapf\Spotify\Abstractions\Common\Image;
use Tnapf\Spotify\Abstractions\Common\Restrictions;

#[SnakeToCamelCase]
class SimplifiedAlbum
{
    public string $albumType;
    public int $totalTracks;

    #[PrimitiveArrayType(name: 'available_markets', type: PrimitiveType::STRING, nullable: true)]
    public array $availableMarkets;

    public ExternalUrls $externalUrls;
    public string $href;
    public string $id;

    #[ObjectArrayType(name: 'images', class: Image::class)]
    public array $images;

    public string $name;
    public string $releaseDate;
    public string $releaseDatePrecision;
    public ?Restrictions $restrictions;
    public string $type;
    public string $uri;

    #[ObjectArrayType(name: 'copyrights', class: Copyright::class, nullable: true)]
    public array $copyrights;

    public ?ExternalIds $externalIds;

    #[PrimitiveArrayType(name: 'genres', type: PrimitiveType::STRING, nullable: true)]
    public array $genres;

    public ?string $label;
    public ?int $popularity;
    public string $albumGroup;

    #[ObjectArrayType(name: 'artists', class: SimplifiedArtist::class)]
    public array $artists;
}
