<?php

namespace App\MyBlogApi\Domain\Post;

interface IdGenerator
{
    function generate(): string;
}
