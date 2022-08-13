<?php

namespace App\Infra\Post;

use App\Domain\Post\Post as DomainPost;
use App\Domain\Post\Repository as DomainRepository;
use App\Infra\Post\Post;

class Repository implements DomainRepository
{
    function add(DomainPost $post): void
    {
        $createData = $post->toObject();
        Post::create([
            'id' => $createData->id,
            'title' => $createData->title,
        ]);
    }
}
