<?php

use App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/post')->group(function () {
    Route::get('/', [Api\Post\Search\Controller::class, 'run']);
    Route::post('/', [Api\Post\Create\Controller::class, 'run']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
