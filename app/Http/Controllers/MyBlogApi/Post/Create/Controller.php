<?php

namespace App\Http\Controllers\MyBlog\Post\Create;

use App\MyBlog\Application\Post\Create\Logger;
use App\MyBlog\Application\Post\Create\Service;
use App\Http\Controllers\MyBlog\Controller as ApiController;
use App\Http\Controllers\MyBlog\Presenter;
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
