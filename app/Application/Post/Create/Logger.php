<?php

namespace App\Application\Post\Create;

interface Logger
{
    function start(Input $input): void;
    function finish(): void;
}
