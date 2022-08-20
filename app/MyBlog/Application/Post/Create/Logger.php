<?php

namespace App\MyBlog\Application\Post\Create;

interface Logger
{
    function start(Input $input): void;
    function finish(): void;
}
