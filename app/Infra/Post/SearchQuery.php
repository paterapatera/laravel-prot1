<?php

namespace App\Infra\Post;

use App\Application\Post\Search\Query;
use Illuminate\Support\Collection;

class SearchQuery implements Query
{
    function search(): Collection
    {
        return Post::all()
            ->map(fn (Post $p) => $p->toDomain());
    }
}
