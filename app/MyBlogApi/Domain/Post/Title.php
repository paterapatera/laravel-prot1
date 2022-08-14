<?php

namespace App\MyBlogApi\Domain\Post;

use App\MyBlogApi\Domain\ValueObject;
use App\Util\Invariant\StringCheckable;

class Title implements ValueObject
{
    use StringCheckable;

    function __construct(private string $value)
    {
        $this->throwIfStrSizeOver($value, 1, 12);
    }

    function get(): string
    {
        return $this->value;
    }
}
