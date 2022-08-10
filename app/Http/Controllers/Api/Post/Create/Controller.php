<?php

namespace App\Http\Controllers\Api\Post\Create;

use App\Application\Post\Create\Service;
use App\Http\Controllers\Api\Controller as ApiController;
use App\Http\Controllers\Api\Presenter;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    function run(Request $request, Service $service): JsonResponse
    {
        $service->run($request->toInput());

        return Presenter::noContent();
    }
}
