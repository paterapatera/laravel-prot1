<?php

namespace App\Util\Invariant;

use App\Util\Exception\StringLengthException;
use App\Util\Exception\UlidException;

trait UlidCheckable
{
    use StringCheckable;

    function throwIfNotUlid(string $value): void
    {
        try {
            $this->throwIfStrSizeOver($value, 26, 26);
        } catch (StringLengthException $e) {
            throw new UlidException();
        }
    }
}
