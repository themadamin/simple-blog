<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Controllers\Auth\LoginController;
use Modules\User\Controllers\Auth\LogoutController;
use Modules\User\Controllers\Auth\RegisterController;
use Modules\User\Controllers\IndexController;
use Modules\User\Controllers\StoreController;
use Modules\User\Controllers\UpdateController;
use Modules\User\Controllers\DeleteController;


Route::middleware('api')->prefix('api')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/auth/logout', LogoutController::class)->name('logout');
        Route::post('/users', StoreController::class)->name('users.store');
        Route::put('/users/{user}', UpdateController::class)->name('users.update');
        Route::delete('/users/{user}', DeleteController::class)->name('users.delete');
    });

    Route::middleware('guest')->group(function () {
        Route::post('/auth/login', LoginController::class)->name('login');
        Route::post('/auth/registration', RegisterController::class)->name('registration');
        Route::get('/users', IndexController::class)->name('users.index');
    });
});
