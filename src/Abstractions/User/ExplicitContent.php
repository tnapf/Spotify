<?php

namespace Tnapf\Spotify\Abstractions\User;

use Tnapf\JsonMapper\Attributes\SnakeToCamelCase;

#[SnakeToCamelCase]
class ExplicitContent
{
    public bool $filterEnabled;
    public bool $filterLocked;
}