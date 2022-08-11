<?php

namespace App\Http\Controllers\Api\Post\Create;

use App\Application\Post\Create\Logger;
use App\Application\Post\Create\Service;
use App\Http\Controllers\Api\Controller as ApiController;
use App\Http\Controllers\Api\Presenter;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    function run(Request $request, Service $service, Logger $logger): JsonResponse
    {
        $logger->start($request->toInput());

        $service->run($request->toInput());
        $response = Presenter::noContent();

        $logger->finish();

        return $response;
    }
}
