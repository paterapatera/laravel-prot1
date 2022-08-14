<?php

namespace App\MyBlogApi\Application\Post\Search;

interface Service
{
    function run(Input $input): Output;
}
