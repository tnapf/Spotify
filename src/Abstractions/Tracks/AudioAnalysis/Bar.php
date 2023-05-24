<?php

namespace Tnapf\Spotify\Abstractions\Tracks\AudioAnalysis;

class Bar
{
    public float|int $start;
    public float|int $duration;
    public float|int $confidence;
}
