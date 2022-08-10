<?php

namespace App\Http\Controllers\Api\Post\Search;

use App\Application\Post\Search\Input;
use App\Http\Controllers\Api\Request as ApiRequest;

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
