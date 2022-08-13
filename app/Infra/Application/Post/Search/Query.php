<?php

namespace App\Infra\Application\Post\Search;

use App\Application\Post\Search\Query as ApplicationQuery;
use App\Infra\Domain\Post\Post;
use Illuminate\Support\Collection;

class Query implements ApplicationQuery
{
    function search(): Collection
    {
        return Post::all()
            ->map(fn (Post $p) => $p->toDomain());
    }
}
