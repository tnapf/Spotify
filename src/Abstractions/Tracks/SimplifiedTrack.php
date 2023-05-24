<?php

namespace Tnapf\Spotify\Abstractions\Tracks;

use Tnapf\JsonMapper\Attributes\PrimitiveArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;
use Tnapf\Spotify\Abstractions\Artist\ExternalUrls;
use Tnapf\Spotify\Abstractions\Artist\SimplifiedArtist;
use Tnapf\Spotify\Abstractions\Common\LinkedFrom;
use Tnapf\Spotify\Abstractions\Common\Restrictions;

#[SnakeToCamelCase]
class SimplifiedTrack
{
    #[ObjectArrayType(name: 'artists', class: SimplifiedArtist::class)]
    public array $artists;

    #[PrimitiveArrayType(name: 'available_markets', type: PrimitiveType::STRING)]
    public array $availableMarkets;

    public int $discNumber;
    public int $durationMs;
    public bool $explicit;
    public ExternalUrls $externalUrls;
    public string $href;
    public string $id;
    public ?bool $isPlayable;
    public ?LinkedFrom $linkedFrom;
    public ?Restrictions $restrictions;
    public string $name;
    public ?string $previewUrl;
    public int $trackNumber;
    public string $type;
    public string $uri;
    public bool $isLocal;
}
