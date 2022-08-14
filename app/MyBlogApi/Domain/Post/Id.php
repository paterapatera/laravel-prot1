<?php

namespace App\MyBlogApi\Domain\Post;

use App\MyBlogApi\Domain\ValueObject;
use App\Util\Invariant\UlidCheckable;

class Id implements ValueObject
{
    use UlidCheckable;
    function __construct(private string $value)
    {
        $this->throwIfNotUlid($value);
    }

    function get(): string
    {
        return $this->value;
    }
}
