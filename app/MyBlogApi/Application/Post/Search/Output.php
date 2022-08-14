<?php

namespace App\MyBlogApi\Application\Post\Search;

use App\MyBlogApi\Domain\Post\Post;
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
