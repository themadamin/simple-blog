<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Controllers\Auth\LoginController;
use Modules\User\Controllers\Auth\LogoutController;
use Modules\User\Controllers\Auth\RegisterController;
use Modules\User\Controllers\ChangeStatusController;
use Modules\User\Controllers\DeleteController;
use Modules\User\Controllers\IndexController;
use Modules\User\Controllers\StoreController;
use Modules\User\Controllers\UpdateController;
use Modules\User\Middleware\AdminMiddleware;


Route::middleware('api')->prefix('api')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/auth/logout', LogoutController::class)->name('logout');

        //Admin routes
        Route::middleware(AdminMiddleware::class)->group(function (){
            //User routes
            Route::get('/users', IndexController::class)->name('users.index');
            Route::post('/users', StoreController::class)->name('users.store');
            Route::put('/users/{user}', UpdateController::class)->name('users.update');
            Route::delete('/users/{user}', DeleteController::class)->name('users.delete');

            //Status routes
            Route::get('/users/statuses', [ChangeStatusController::class, 'index'])->name('users.statuses');
            Route::put('/users/change-status/{user}', [ChangeStatusController::class, 'change'])->name('users.change-status');

        });
    });

    Route::middleware('guest')->group(function () {
        Route::post('/auth/login', LoginController::class)->name('login');
        Route::post('/auth/registration', RegisterController::class)->name('registration');
    });
});
