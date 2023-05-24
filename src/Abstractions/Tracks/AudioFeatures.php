<?php

namespace Tnapf\Spotify\Abstractions\Tracks;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class AudioFeatures
{
    public float $acousticness;
    public string $analysisUrl;
    public float|int $danceability;
    public int $durationMs;
    public float|int $energy;
    public string $id;
    public float|int $instrumentalness;
    public int $key;
    public float|int $liveness;
    public float|int $loudness;
    public int $mode;
    public float|int $speechiness;
    public float|int $tempo;
    public int $timeSignature;
    public string $trackHref;
    public string $type;
    public string $uri;
    public float|int $valence;
}
