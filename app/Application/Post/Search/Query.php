<?php

namespace App\Application\Post\Search;

use App\Domain\Post\Post;
use Illuminate\Support\Collection;

interface Query
{
    /**
     * @return Collection<int, Post>
     */
    function search(): Collection;
}
