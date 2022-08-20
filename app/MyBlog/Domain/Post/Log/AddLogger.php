<?php

namespace App\MyBlog\Domain\Post\Log;

use App\MyBlog\Domain\Post\Post;

interface AddLogger
{
    function addStart(Post $post): void;
    function addFinish(Post $post): void;
    function addFailed(Post $post): void;
}
