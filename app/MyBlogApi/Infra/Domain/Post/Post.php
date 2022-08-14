<?php

namespace App\MyBlogApi\Infra\Domain\Post;

use App\MyBlogApi\Domain\Post\Post as PostDomain;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id', 'title'];

    function toDomain(): PostDomain
    {
        return PostDomain::of($this->id, $this->title);
    }
}
