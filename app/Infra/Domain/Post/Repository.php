<?php

namespace App\Infra\Domain\Post;

use App\Domain\Post\Post as DomainPost;
use App\Domain\Post\Repository as DomainRepository;

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
