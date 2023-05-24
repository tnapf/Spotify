<?php

namespace Tnapf\Spotify\Exceptions;

use Exception;
use Tnapf\Spotify\Abstractions\Errors\AuthenticationError;
use Tnapf\Spotify\Abstractions\Errors\Error;

class HttpException extends Exception
{
    public function __construct(
        public readonly Error|AuthenticationError $error,
        ?Throwable $previous = null
    ) {
        parent::__construct($error->message ?? $error->error, $error->status ?? 0, $previous);
    }
}
