<?php

namespace Tnapf\Spotify\Rest;

class Endpoint
{
    public const BASE = 'https://api.spotify.com/v1';
    public const ALBUMS = '/albums';
    public const ALBUMS_ID = '/albums/:id:';
    public const ALBUMS_ID_TRACKS = '/albums/:id:/tracks';
    public const ARTISTS = '/artists';
    public const ARTISTS_ID = '/artists/:id:';
    public const ARTISTS_ID_ALBUMS = '/artists/:id:/albums';
    public const ARTISTS_ID_TOP_TRACKS = '/artists/:id:/top-tracks';
    public const ARTISTS_ID_RELATED_ARTISTS = '/artists/:id:/related-artists';

    public static function bind(string $endpoint, array $params = [], array $getParams = [], ?string $market = null): string
    {
        $endpoint = self::BASE.$endpoint;

        foreach ($params as $key => $value) {
            $endpoint = str_replace(":{$key}:", $value, $endpoint);
        }

        if ($market !== null) {
            $getParams['market'] = $market;
        }

        if (!empty($getParams)) {
            $endpoint .= '?'.http_build_query($getParams, '', '&');
        }

        return $endpoint;
    }
}
