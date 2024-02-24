<?php

namespace Tnapf\Spotify\Abstractions\Playback;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Actions
{
    public ?bool $interruptingPlayback;
    public ?bool $pausing;
    public ?bool $resuming;
    public ?bool $seeking;
    public ?bool $skippingNext;
    public ?bool $skippingPrev;
    public ?bool $togglingRepeatContext;
    public ?bool $togglingRepeatTrack;
    public ?bool $togglingShuffle;
    public ?bool $transferringPlayback;
}