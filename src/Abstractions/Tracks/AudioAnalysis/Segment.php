<?php

namespace Tnapf\Spotify\Abstractions\Tracks\AudioAnalysis;

use Tnapf\JsonMapper\Attributes\PrimitiveArrayType;
use Tnapf\JsonMapper\Attributes\PrimitiveType;
use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Segment
{
    public float|int $start;
    public float|int $duration;
    public float|int $confidence;
    public float|int $loudnessStart;
    public float|int $loudnessMax;
    public float|int $loudnessMaxTime;
    public float|int $loudnessEnd;

    #[PrimitiveArrayType(name: 'pitches', type: PrimitiveType::INT)]
    #[PrimitiveArrayType(name: 'pitches', type: PrimitiveType::FLOAT)]
    public array $pitches;

    #[PrimitiveArrayType(name: 'timbre', type: PrimitiveType::INT)]
    #[PrimitiveArrayType(name: 'timbre', type: PrimitiveType::FLOAT)]
    public array $timbre;
}