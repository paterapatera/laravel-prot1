<?php

namespace App\Application\Post\Create;

use App\Domain\Post\Title;

class Input
{
  function __construct(public Title $title)
  {
  }
}
