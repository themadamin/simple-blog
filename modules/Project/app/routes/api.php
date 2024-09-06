<?php

use Illuminate\Support\Facades\Route;
use Modules\Project\Controllers\ProjectController;

Route::middleware('api')->prefix('api')->group(function () {
    Route::middleware('auth:sanctum')->group(function (){
        Route::apiResource('/projects', ProjectController::class)->except(['index', 'show']);
    });

    Route::middleware('guest')->group(function (){
        Route::apiResource('/projects', ProjectController::class)->only(['index', 'show']);
    });
});
