<?php

namespace App\MyBlog\Application\Post\Search;

use App\MyBlog\Domain\Post\Post;
use Illuminate\Support\Collection;

class Output
{
    /**
     * @param Collection<int, Post> $posts
     */
    function __construct(public Collection $posts)
    {
    }
}
