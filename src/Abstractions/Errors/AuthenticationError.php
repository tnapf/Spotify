<?php

namespace Tnapf\Spotify\Abstractions\Errors;

class AuthenticationError
{
    public string $error;
    public ?string $errorDescription;
}
