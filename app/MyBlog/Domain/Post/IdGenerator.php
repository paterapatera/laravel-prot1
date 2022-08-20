<?php

namespace App\MyBlog\Domain\Post;

interface IdGenerator
{
    function generate(): string;
}
