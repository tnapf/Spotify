<?php

namespace Tnapf\Spotify\Abstractions\Playlist;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;
use Tnapf\Spotify\Abstractions\Users\User;
use Tnapf\Spotify\Abstractions\Track\Track as TrackObject;

#[SnakeToCamelCase]
class Track
{
    public string $addedAt;
    public ?User $addedBy;
    public bool $isLocal;
    public TrackObject $track; // TODO: Add EpisodeObject
}
