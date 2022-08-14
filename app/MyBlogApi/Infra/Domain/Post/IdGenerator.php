<?php

namespace App\MyBlogApi\Infra\Domain\Post;

use App\MyBlogApi\Domain\Post\IdGenerator as PostIdGenerator;
use Ulid\Ulid;

class IdGenerator implements PostIdGenerator
{
    function generate(): string
    {
        return Ulid::generate();;
    }
}
