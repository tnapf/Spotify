<?php

namespace Tnapf\Spotify\Abstractions\Authorization;

/** @see https://developer.spotify.com/documentation/web-api/concepts/scopes */
enum Scope: string
{
    // IMAGES
    case UGC_IMAGE_UPLOAD = 'ugc-image-upload';

    // SPOTIFY CONNECT
    case USER_READ_PLAYBACK_STATE = 'user-read-playback-state';
    case USER_MODIFY_PLAYBACK_STATE = 'user-modify-playback-state';
    case USER_READ_CURRENTLY_PLAYING = 'user-read-currently-playing';

    // PLAYBACK
    case APP_REMOTE_CONTROL = 'app-remote-control';
    case STREAMING = 'streaming';

    // PLAYLISTS
    case PLAYLIST_READ_PRIVATE = 'playlist-read-private';
    case PLAYLIST_READ_COLLABORATIVE = 'playlist-read-collaborative';
    case PLAYLIST_MODIFY_PUBLIC = 'playlist-modify-public';

    // FOLLOW
    case USER_FOLLOW_MODIFY = 'user-follow-modify';
    case USER_FOLLOW_READ = 'user-follow-read';

    // LISTENING HISTORY
    case USER_READ_PLAYBACK_POSITION = 'user-read-playback-position';
    case USER_TOP_READ = 'user-top-read';
    case USER_READ_RECENTLY_PLAYED = 'user-read-recently-played';

    // LIBRARY
    case USER_LIBRARY_MODIFY = 'user-library-modify';
    case USER_LIBRARY_READ = 'user-library-read';

    // USERS
    case USER_READ_EMAIL = 'user-read-email';
    case USER_READ_PRIVATE = 'user-read-private';

    // OPEN ACCESS
    case USER_SOA_LINK = 'user-soa-link';
    case USER_SOA_UNLINK = 'user-soa-unlink';
    case USER_MANAGE_ENTITLEMENTS = 'user-manage-entitlements';
    case USER_MANAGE_PARTNER = 'user-manage-partner';
    case USER_CREATE_PARTNER = 'user-create-partner';
}
