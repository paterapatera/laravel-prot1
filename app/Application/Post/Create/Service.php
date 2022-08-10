<?php

namespace App\Application\Post\Create;

interface Service
{
    function run(Input $input): void;
}
