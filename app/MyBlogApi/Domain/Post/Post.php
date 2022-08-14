<?php

namespace App\MyBlogApi\Domain\Post;

use App\MyBlogApi\Domain\Entity;

class Post implements Entity
{
    function __construct(private Id $id, private Title $title)
    {
    }

    static function of(string $id, string $title): self
    {
        return new self(new Id($id), new Title($title));
    }

    function toObject(): PostDto
    {
        return new PostDto($this->id->get(), $this->title->get());
    }
}

class PostDto
{
    function __construct(public string $id, public string $title)
    {
    }
}
