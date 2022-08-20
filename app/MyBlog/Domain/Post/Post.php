<?php

namespace App\MyBlog\Domain\Post;

use App\MyBlog\Domain\Entity;

class Post implements Entity
{
    function __construct(private Id $id, private Title $title)
    {
    }

    static function of(string $id, string $title): self
    {
        return new self(new Id($id), new Title($title));
    }

    function val(): PostDto
    {
        return new PostDto($this->id->val(), $this->title->val());
    }
}

class PostDto
{
    function __construct(public string $id, public string $title)
    {
    }
}
