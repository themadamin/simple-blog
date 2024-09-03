<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Controllers\CategoryController;
use Modules\Project\Controllers\ProjectController;
use Modules\User\Controllers\Auth\LoginController;
use Modules\User\Controllers\Auth\LogoutController;
use Modules\User\Controllers\Auth\RegisterController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/logout', LogoutController::class)->name('logout');
    Route::apiResource('/projects', ProjectController::class)->except(['index', 'show']);
    Route::apiResource('/categories', CategoryController::class)->except(['index', 'show']);
});

Route::middleware('guest')->group(function () {
    Route::post('/auth/login', LoginController::class)->name('login');
    Route::post('/auth/registration', RegisterController::class)->name('registration');
    Route::apiResource('/projects', ProjectController::class)->only(['index', 'show']);
    Route::apiResource('/categories', CategoryController::class)->only(['index', 'show']);
});

