<?php

namespace App\MyBlog\Infra\Domain\Post;

use App\MyBlog\Domain\Post\IdGenerator as PostIdGenerator;
use Ulid\Ulid;

class IdGenerator implements PostIdGenerator
{
    function generate(): string
    {
        return Ulid::generate();;
    }
}
