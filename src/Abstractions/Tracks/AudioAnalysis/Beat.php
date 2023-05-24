<?php

namespace Tnapf\Spotify\Abstractions\Tracks\AudioAnalysis;

class Beat
{
    public float|int $start;
    public float|int $duration;
    public float|int $confidence;
}