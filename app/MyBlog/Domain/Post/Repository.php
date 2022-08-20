<?php

namespace App\MyBlog\Domain\Post;

interface Repository
{
    function add(Post $post): void;
}
