<?php

namespace App\MyBlog\Application\Post\Create;

interface Service
{
    function run(Input $input): void;
}
