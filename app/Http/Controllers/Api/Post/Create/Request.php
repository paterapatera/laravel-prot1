<?php

namespace App\Http\Controllers\Api\Post\Create;

use App\Application\Post\Create\Input;
use App\Domain\Post\Id;
use App\Domain\Post\Title;
use App\Http\Controllers\Api\Request as ApiRequest;

class Request extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title' => 'string'
        ];
    }

    public function toInput(): Input
    {
        return new Input($this->string('title'));
    }
}
