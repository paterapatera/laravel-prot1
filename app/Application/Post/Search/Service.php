<?php

namespace App\Application\Post\Search;

interface Service
{
    function run(Input $input): Output;
}
