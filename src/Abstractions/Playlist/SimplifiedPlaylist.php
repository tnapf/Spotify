<?php

namespace Tnapf\Spotify\Abstractions\Playlist;

use Tnapf\JsonMapper\Attributes\ObjectArrayType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;
use Tnapf\Spotify\Abstractions\Artist\ExternalUrls;
use Tnapf\Spotify\Abstractions\Common\Image;
use Tnapf\Spotify\Abstractions\User\User;

#[SnakeToCamelCase]
class SimplifiedPlaylist
{
    public bool $collaborative;
    public ?string $description;
    public ExternalUrls $externalUrls;
    public string $href;
    public string $id;

    #[ObjectArrayType('images', Image::class)]
    public array $images;

    public string $name;
    public User $owner;
    public bool $public;
    public string $snapshotId;
    public SimplifiedPlaylistTracks $tracks;
    public string $type;
    public string $uri;
}