<?php

namespace App\Infra\Domain\Post;

use App\Domain\Post\IdGenerator as PostIdGenerator;
use Ulid\Ulid;

class IdGenerator implements PostIdGenerator
{
    function generate(): string
    {
        return Ulid::generate();;
    }
}
