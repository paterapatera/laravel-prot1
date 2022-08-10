<?php

namespace App\Http\Controllers\Api\Post\Search;

use App\Application\Post\Search\Service;
use App\Http\Controllers\Api\Controller as ApiController;
use App\Http\Controllers\Api\Presenter;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    function run(Request $request, Service $service): JsonResponse
    {
        $output = $service->run($request->toInput());

        return Presenter::success(Response::from($output));
    }
}
