<?php

namespace App\Http\Controllers\MyBlog\Post\Search;

use App\MyBlog\Application\Post\Search\Service;
use App\Http\Controllers\MyBlog\Controller as ApiController;
use App\Http\Controllers\MyBlog\Presenter;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    function run(Request $request, Service $service): JsonResponse
    {
        $output = $service->run($request->toInput());

        return Presenter::success(Response::from($output));
    }
}
