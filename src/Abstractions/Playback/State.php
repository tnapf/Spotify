<?php

namespace Tnapf\Spotify\Abstractions\Playback;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;
use Tnapf\Spotify\Abstractions\Track\Track;

#[SnakeToCamelCase]
class State
{
    public Device $device;
    public RepeatState $repeatState;
    public Context $context;
    public int $timestamp;
    public int $progressMs;
    public bool $isPlaying;
    public ?Track $item;
    public string $currentlyPlayingType;
    public Actions $actions;
}