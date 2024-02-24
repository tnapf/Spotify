<?php

namespace Tnapf\Spotify\Abstractions\Playback;

enum RepeatState: string
{
    case Off = 'off';
    case Track = 'track';
    case Context = 'context';
}