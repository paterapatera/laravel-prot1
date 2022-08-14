<?php

namespace App\MyBlogApi\Infra\Domain\Post;

use App\MyBlogApi\Domain\Post\Post as DomainPost;
use App\MyBlogApi\Domain\Post\Repository as DomainRepository;

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
