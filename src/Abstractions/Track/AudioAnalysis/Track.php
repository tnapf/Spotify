<?php

namespace Tnapf\Spotify\Abstractions\Track\AudioAnalysis;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class Track
{
    public int $numSamples;
    public int|float $duration;
    public string $sampleMd5;
    public int $offsetSeconds;
    public int $windowSeconds;
    public int $analysisSampleRate;
    public float|int $endOfFadeIn;
    public float|int $startOfFadeOut;
    public float|int $loudness;
    public float|int $tempo;
    public float|int $tempoConfidence;
    public float|int $timeSignature;
    public float|int $timeSignatureConfidence;
    public int $key;
    public float|int $keyConfidence;
    public int $mode;
    public float|int $modeConfidence;
    public string $codestring;
    public float|int $codeVersion;
    public string $echoprintstring;
    public float|int $echoprintVersion;
    public string $synchstring;
    public float|int $synchVersion;
    public string $rhythmstring;
    public float|int $rhythmVersion;
}
