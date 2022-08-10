<?php

namespace App\Http\Controllers\Api\Post\Create;

use App\Application\Post\Create;
use App\Http\Controllers\Api\Controller as ApiController;
use App\Http\Controllers\Api\Presenter;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    function run(Request $request, Create\Service $service): JsonResponse
    {
        $service->run(new Create\Input());

        return Presenter::noContent();
    }
}
