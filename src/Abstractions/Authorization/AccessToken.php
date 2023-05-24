<?php

namespace Tnapf\Spotify\Abstractions\Authorization;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class AccessToken
{
    public string $accessToken;
    public string $tokenType;
    public int $expiresIn;

    public function isExpired(): bool
    {
        return $this->expiresIn < time();
    }
}
