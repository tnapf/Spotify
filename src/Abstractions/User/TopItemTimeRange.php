<?php

namespace Tnapf\Spotify\Abstractions\User;

enum TopItemTimeRange: string
{
    case SHORT_TERM = 'short_term';
    case MEDIUM_TERM = 'medium_term';
    case LONG_TERM = 'long_term';
}