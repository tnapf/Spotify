<?php

namespace Tnapf\Spotify\Abstractions\Playback;

enum ContentType: string
{
    case ARTIST = 'artist';
    case PLAYLIST = 'playlist';
    case ALBUM = 'album';
    case SHOW = 'show';
}
