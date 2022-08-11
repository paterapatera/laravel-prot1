<?php

namespace App\Domain\Post;

interface Repository
{
    function add(Post $post): void;
}
