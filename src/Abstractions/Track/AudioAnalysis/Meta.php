<?php

namespace Tnapf\Spotify\Abstractions\Track\AudioAnalysis;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Meta
{
    public ?string $analysisVersion;
    public string $platform;
    public string $detailedStatus;
    public int $statusCode;
    public int $timestamp;
    public float|int $analysisTime;
    public string $inputProcess;
}
