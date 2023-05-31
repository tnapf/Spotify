<?php

namespace Tnapf\Spotify\Abstractions\Track\AudioAnalysis;

class Bar
{
    public float|int $start;
    public float|int $duration;
    public float|int $confidence;
}
