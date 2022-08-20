<?php

namespace App\MyBlog\Application\Post\Search;

use App\MyBlog\Domain\Post\Post;
use Illuminate\Support\Collection;

interface Query
{
    /**
     * @return Collection<int, Post>
     */
    function search(): Collection;
}
