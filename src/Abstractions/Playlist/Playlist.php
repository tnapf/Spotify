<?php

namespace Tnapf\Spotify\Abstractions\Playlist;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;
use Tnapf\Spotify\Abstractions\Artist\ExternalUrls;
use Tnapf\Spotify\Abstractions\Common\Image;

#[SnakeToCamelCase]
class Playlist
{
    public bool $collaborative;
    public ?string $description;
    public ExternalUrls $externalUrls;
    public Followers $followers;
    public string $href;
    public string $id;

    #[ObjectArrayType('images', Image::class)]
    public array $images;

    public bool $public;
    public string $snapshotId;
    public Tracks $tracks;
}
