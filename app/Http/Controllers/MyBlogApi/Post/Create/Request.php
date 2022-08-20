<?php

namespace App\Http\Controllers\MyBlog\Post\Create;

use App\MyBlog\Application\Post\Create\Input;
use App\Http\Controllers\MyBlog\Request as ApiRequest;

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
