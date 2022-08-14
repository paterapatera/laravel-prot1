<?php

namespace App\MyBlogApi\Application\Post\Search;

use App\MyBlogApi\Domain\Post\Post;
use Illuminate\Support\Collection;

interface Query
{
    /**
     * @return Collection<int, Post>
     */
    function search(): Collection;
}
