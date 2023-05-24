<?php

namespace Tnapf\Spotify\Abstractions\Tracks\AudioAnalysis;

class AudioAnalysis
{
    public Meta $meta;
    public Track $track;

    #[ObjectArrayType(name: 'bars', type: Bar::class)]
    public array $bars;

    #[ObjectArrayType(name: 'beats', type: Beat::class)]
    public array $beats;

    #[ObjectArrayType(name: 'sections', type: Section::class)]
    public array $sections;

    #[ObjectArrayType(name: 'segments', type: Segment::class)]
    public array $segments;

    #[ObjectArrayType(name: 'tatums', type: Tatum::class)]
    public array $tatums;
}
