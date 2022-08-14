<?php

namespace App\Http\Controllers\MyBlogApi\Post\Create;

use App\MyBlogApi\Application\Post\Create\Logger;
use App\MyBlogApi\Application\Post\Create\Service;
use App\Http\Controllers\MyBlogApi\Controller as ApiController;
use App\Http\Controllers\MyBlogApi\Presenter;
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
