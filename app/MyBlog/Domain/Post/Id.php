<?php

namespace App\MyBlog\Domain\Post;

use App\SharedContext\Domain\ValueObject;
use App\Util\Invariant\UlidCheckable;

class Id implements ValueObject
{
    use UlidCheckable;
    function __construct(private string $value)
    {
        $this->throwIfNotUlid($value);
    }

    function val(): string
    {
        return $this->value;
    }
}
