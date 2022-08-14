<?php

namespace App\MyBlogApi\Application\Post\Create;

interface Service
{
    function run(Input $input): void;
}
