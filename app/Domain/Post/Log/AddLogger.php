<?php

namespace App\Domain\Post\Log;

use App\Domain\Post\Post;

interface AddLogger
{
    function addStart(Post $post): void;
    function added(Post $post): void;
    function addFailed(Post $post): void;
}