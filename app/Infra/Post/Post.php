<?php

namespace App\Infra\Post;

use App\Domain\Post\Id;
use App\Domain\Post\Post as PostDomain;
use App\Domain\Post\Title;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    function toDomain(): PostDomain
    {
        return new PostDomain(new Id($this->id), new Title($this->title));
    }
}
