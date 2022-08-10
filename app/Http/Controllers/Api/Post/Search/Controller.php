<?php

namespace App\Http\Controllers\Api\Post\Search;

use App\Application\Post\Search;
use App\Http\Controllers\Api\Controller as ApiController;
use App\Http\Controllers\Api\Presenter;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    function run(Search\Service $service): JsonResponse
    {
        $output = $service->run(new Search\Input());

        return Presenter::success(Response::make($output));
    }
}
