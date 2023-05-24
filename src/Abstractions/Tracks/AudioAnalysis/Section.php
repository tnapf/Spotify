<?php

namespace Tnapf\Spotify\Abstractions\Tracks\AudioAnalysis;

class Section
{
    public float|int $start;
    public float|int $duration;
    public float|int $confidence;
    public float|int $loudness;
    public float|int $tempo;
    public float|int $tempoConfidence;
    public int $key;
    public float|int $keyConfidence;
    public int $mode;
    public float|int $modeConfidence;
    public int $timeSignature;
    public float|int $timeSignatureConfidence;
}