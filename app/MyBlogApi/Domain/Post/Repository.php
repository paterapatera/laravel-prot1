<?php

namespace App\MyBlogApi\Domain\Post;

interface Repository
{
    function add(Post $post): void;
}
