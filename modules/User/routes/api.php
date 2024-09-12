<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Controllers\Auth\LoginController;
use Modules\User\Controllers\Auth\LogoutController;
use Modules\User\Controllers\Auth\RegisterController;


Route::middleware('api')->prefix('api')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/auth/logout', LogoutController::class)->name('logout');
    });

    Route::middleware('guest')->group(function () {
        Route::post('/auth/login', LoginController::class)->name('login');
        Route::post('/auth/registration', RegisterController::class)->name('registration');
    });
});
