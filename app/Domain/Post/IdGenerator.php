<?php

namespace App\Domain\Post;

interface IdGenerator
{
    function generate(): string;
}
