<?php

namespace App\Domain\Post\Log;

use App\Domain\Post\Post;

interface CreateLogger
{
    function create(Post $post): void;
    function created(Post $post): void;
    function createFailed(Post $post): void;
}
