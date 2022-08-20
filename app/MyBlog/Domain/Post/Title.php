<?php

namespace App\MyBlog\Domain\Post;

use App\MyBlog\Domain\ValueObject;
use App\Util\Invariant\StringCheckable;

class Title implements ValueObject
{
    use StringCheckable;

    function __construct(private string $value)
    {
        $this->throwIfStrSizeOver($value, 1, 12);
    }

    function val(): string
    {
        return $this->value;
    }
}
