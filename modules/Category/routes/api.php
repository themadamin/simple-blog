<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Controllers\DeleteController;
use Modules\Category\Controllers\IndexController;
use Modules\Category\Controllers\ShowController;
use Modules\Category\Controllers\StoreController;
use Modules\Category\Controllers\UpdateController;

Route::middleware('api')->prefix('api')->group(function () {
    Route::middleware('auth:sanctum')->group(function (){
        Route::post('/categories', StoreController::class);
        Route::put('/categories/{category}', UpdateController::class);
        Route::delete('/categories/{category}', DeleteController::class);
    });

    Route::middleware('guest')->group(function (){
        Route::get('/categories', IndexController::class);
        ROute::get('/categories/{category}', ShowController::class);
    });
});
