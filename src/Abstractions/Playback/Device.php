<?php

namespace Tnapf\Spotify\Abstractions\Playback;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Device
{
    public ?string $id;
    public ?bool $active;
    public bool $isPrivateSession;
    public bool $isRestricted;
    public string $name;
    public string $type;
    public int $volumePercent;
    public ?bool $supportsVolume;
}