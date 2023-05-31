<?php

namespace Tnapf\Spotify\Abstractions\Track;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;
use Tnapf\Spotify\Abstractions\Album\Album;
use Tnapf\Spotify\Abstractions\Artist\Artist;
use Tnapf\Spotify\Abstractions\Artist\ExternalUrls;
use Tnapf\Spotify\Abstractions\Common\ExternalIds;
use Tnapf\Spotify\Abstractions\Common\LinkedFrom;
use Tnapf\Spotify\Abstractions\Common\Restrictions;

#[SnakeToCamelCase]
class Track
{
    public Album $album;

    #[ObjectArrayType(name: 'artists', class: Artist::class)]
    public array $artists;

    #[PrimitiveArrayType(name: 'available_markets', type: PrimitiveType::STRING, nullable: true)]
    public array $availableMarkets;

    public int $discNumber;
    public int $durationMs;
    public bool $explicit;
    public ExternalIds $externalIds;
    public ExternalUrls $externalUrls;
    public string $href;
    public string $id;
    public ?bool $isPlayable;
    public ?LinkedFrom $linkedFrom;
    public ?Restrictions $restrictions;
    public string $name;
    public int $popularity;
    public ?string $previewUrl;
    public int $trackNumber;
    public string $type;
    public string $uri;
    public bool $isLocal;
}
