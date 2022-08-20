<?php

namespace App\MyBlog\Infra\Domain\Post;

use App\MyBlog\Domain\Post\Post as DomainPost;
use App\MyBlog\Domain\Post\Repository as DomainRepository;

class Repository implements DomainRepository
{
    function add(DomainPost $post): void
    {
        $createData = $post->val();
        Post::create([
            'id' => $createData->id,
            'title' => $createData->title,
        ]);
    }
}
