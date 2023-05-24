<?php

namespace Tnapf\Spotify\Rest;

class Endpoint
{
    public const BASE = 'https://api.spotify.com/v1';
    public const ALBUMS = '/albums'; // GET
    public const ALBUMS_ID = '/albums/:id:'; // GET
    public const ALBUM_TRACKS = '/albums/:id:/tracks'; // GET
    public const ARTIST = '/artists';
    public const GET_ARTIST = '/artists/:id:';

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
