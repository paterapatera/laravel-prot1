<?php

namespace App\Domain\Post;

use App\Domain\Entity;

class Post implements Entity
{
    function __construct(public Id $id, public Title $title)
    {
    }

    static function of(string $id, string $title): self
    {
        return new self(new Id($id), new Title($title));
    }

    /**
     * @return object{id: string, title: string}
     */
    function toObject(): object
    {
        return (object)[
            'id' => $this->id->get(),
            'title' => $this->title->get()
        ];
    }
}
