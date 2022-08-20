<?php

namespace App\Http\Controllers\MyBlog\Post\Search;

use App\MyBlog\Application\Post\Search\Input;
use App\Http\Controllers\MyBlog\Request as ApiRequest;

class Request extends ApiRequest
{
    public function rules(): array
    {
        return [];
    }

    public function toInput(): Input
    {
        return new Input();
    }
}
