<?php

namespace Tnapf\Spotify\Rest;

use Tnapf\Spotify\Http;

class RestBase
{
    public function __construct(
        protected readonly Http $http
    ) {

    }
}
