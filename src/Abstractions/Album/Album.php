<?php

namespace Tnapf\Spotify\Abstractions\Album;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;
use Tnapf\Spotify\Abstractions\Artist\Artist;
use Tnapf\Spotify\Abstractions\Artist\ExternalUrls;
use Tnapf\Spotify\Abstractions\Common\Copyright;
use Tnapf\Spotify\Abstractions\Common\ExternalIds;
use Tnapf\Spotify\Abstractions\Common\Image;

/**
 * @see https://developer.spotify.com/documentation/web-api/reference/get-an-album
 */
#[SnakeToCamelCase]
class Album
{
    public string $albumType;
    public int $totalTracks;
    public ExternalUrls $externalUrls;
    public string $href;
    public string $id;

    /** @var Image[] */
    #[ObjectArrayType(name: 'images', class: Image::class)]
    public array $images;

    public string $name;
    public string $releaseDate;
    public string $releaseDatePrecision;
    public string $type;
    public string $uri;

    /** @var Copyright[] */
    #[ObjectArrayType(name: 'copyrights', class: Copyright::class)]
    public array $copyrights;

    public ExternalIds $externalIds;

    /** @var string[] */
    #[PrimitiveArrayType(name: 'genres', type: PrimitiveType::STRING, nullable: true)]
    public array $genres = [];

    public string $label;
    public int $popularity;

    /** @var Artist[] */
    #[ObjectArrayType(name: 'artists', class: Artist::class)]
    public array $artists;

    public Tracks $tracks;

    public function getUserUrl(): string
    {
        return "https://open.spotify.com/album/{$this->id}";
    }
}
