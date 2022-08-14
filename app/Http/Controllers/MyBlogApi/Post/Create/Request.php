<?php

namespace App\Http\Controllers\MyBlogApi\Post\Create;

use App\MyBlogApi\Application\Post\Create\Input;
use App\Http\Controllers\MyBlogApi\Request as ApiRequest;

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
