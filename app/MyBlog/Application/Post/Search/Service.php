<?php

namespace App\MyBlog\Application\Post\Search;

interface Service
{
    function run(Input $input): Output;
}
