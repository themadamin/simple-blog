<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Controllers\CategoryController;

Route::middleware('api')->prefix('api')->group(function () {
    Route::middleware('auth:sanctum')->group(function (){
        Route::apiResource('/categories', CategoryController::class)->except(['index', 'show', 'update']);
        Route::put('/categories/{category}', [CategoryController::class, 'update']);
    });

    Route::middleware('guest')->group(function (){
        Route::apiResource('/categories', CategoryController::class)->only(['index', 'show']);
    });
});
