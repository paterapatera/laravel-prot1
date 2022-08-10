<?php

namespace App\Util\Invariant;

use App\Util\Exception\NullException;

trait BaseCheckable
{
    function throwIfNull($value): void
    {
        if (is_null($value)) throw new NullException();
    }
}
