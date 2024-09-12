<?php

use Illuminate\Support\Facades\Route;
use Modules\Project\Controllers\DeleteController;
use Modules\Project\Controllers\IndexController;
use Modules\Project\Controllers\ShowController;
use Modules\Project\Controllers\StoreController;
use Modules\Project\Controllers\UpdateController;

Route::middleware('api')->prefix('api')->group(function () {
    Route::middleware('auth:sanctum')->group(function (){
        Route::post('/projects', StoreController::class);
        Route::put('/projects/{project}', UpdateController::class);
        Route::delete('/projects/{project}', DeleteController::class);
    });

    Route::middleware('guest')->group(function (){
        Route::get('/projects', IndexController::class);
        Route::get('/projects/{project}', ShowController::class);
    });
});
