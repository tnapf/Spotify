<?php

namespace Tnapf\Spotify\Abstractions\User;

enum TopItemType: string
{
    case ARTISTS = 'artists';
    case TRACKS = 'tracks';
}