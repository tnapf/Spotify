<?php

namespace Tnapf\Spotify\Rest;

use Tnapf\Spotify\Abstractions\Tracks\AudioAnalysis\AudioAnalysis;
use Tnapf\Spotify\Abstractions\Tracks\AudioFeatures;
use Tnapf\Spotify\Abstractions\Tracks\Track;
use Tnapf\Spotify\Enums\Method;

class Tracks extends RestBase
{
    public function get(string $id, ?string $market = null): Track
    {
        return $this->http->mapRequest(
            Track::class,
            Method::GET,
            Endpoint::bind(Endpoint::TRACKS_ID, compact('id'), market: $market),
            headers: $this->http->mergeHeaders()
        );
    }

    /** @return Track[] */
    public function getSeveral(array $ids, ?string $market = null): array
    {
        $ids = implode(',', $ids);

        return $this->http->arrayMapRequest(
            Track::class,
            Method::GET,
            Endpoint::bind(Endpoint::TRACKS, getParams: compact('ids'), market: $market),
            headers: $this->http->mergeHeaders(),
            callback: static fn (array $data) => $data['tracks']
        );
    }

    public function getAudioFeatures(string $id): AudioFeatures
    {
        return $this->http->mapRequest(
            AudioFeatures::class,
            Method::GET,
            Endpoint::bind(Endpoint::TRACK_AUDIO_FEATURES_ID, compact('id')),
            headers: $this->http->mergeHeaders()
        );
    }

    /** @return AudioFeatures[] */
    public function getSeveralAudioFeatures(array $ids): array
    {
        $ids = implode(',', $ids);

        return $this->http->arrayMapRequest(
            AudioFeatures::class,
            Method::GET,
            Endpoint::bind(Endpoint::TRACK_AUDIO_FEATURES, getParams: compact('ids')),
            headers: $this->http->mergeHeaders(),
            callback: static fn (array $data) => $data['audio_features']
        );
    }

    /** @return AudioAnalysis[] */
    public function getAudioAnalysis(string $id): AudioAnalysis
    {
        return $this->http->mapRequest(
            AudioAnalysis::class,
            Method::GET,
            Endpoint::bind(Endpoint::TRACK_AUDIO_ANALYSIS, compact('id')),
            headers: $this->http->mergeHeaders()
        );
    }

    // TODO: Add Get Recommendations
}
