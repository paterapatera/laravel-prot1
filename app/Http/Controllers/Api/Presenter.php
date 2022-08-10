<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Response;

class Presenter
{
    static function success(array|object $output = null): JsonResponse
    {
        return Response::json($output);
    }

    static function noContent(): JsonResponse
    {
        return Response::json(null, 204);
    }

    static function badRequest(array|object $output = null): JsonResponse
    {
        return Response::json($output, 400);
    }

    static function unauthorized(array|object $output = null): JsonResponse
    {
        return Response::json($output, 401);
    }

    static function forbidden(array|object $output = null): JsonResponse
    {
        return Response::json($output, 403);
    }

    static function notFound(array|object $output = null): JsonResponse
    {
        return Response::json($output, 404);
    }

    static function internalServerError(array|object $output = null): JsonResponse
    {
        return Response::json($output, 500);
    }
}
