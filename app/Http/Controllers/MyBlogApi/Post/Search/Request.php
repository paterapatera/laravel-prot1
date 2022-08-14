<?php

namespace App\Http\Controllers\MyBlogApi\Post\Search;

use App\MyBlogApi\Application\Post\Search\Input;
use App\Http\Controllers\MyBlogApi\Request as ApiRequest;

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
