<?php

namespace App\Http\Controllers\MyBlogApi\Post\Search;

use App\MyBlogApi\Application\Post\Search\Service;
use App\Http\Controllers\MyBlogApi\Controller as ApiController;
use App\Http\Controllers\MyBlogApi\Presenter;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    function run(Request $request, Service $service): JsonResponse
    {
        $output = $service->run($request->toInput());

        return Presenter::success(Response::from($output));
    }
}
