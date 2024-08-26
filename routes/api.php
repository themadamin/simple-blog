<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function (){
    Route::post('/auth/registration', RegisterController::class)->name('registration');
    Route::get('/auth/logout', LogoutController::class)->name('logout');
    Route::apiResource('/projects', ProjectController::class)->except(['index', 'show']);
    Route::apiResource('/categories', CategoryController::class)->except(['index', 'show']);
});

Route::middleware('guest')->group(function (){
    Route::post('/auth/login', LoginController::class)->name('login');
   Route::apiResource('/projects', ProjectController::class)->only(['index', 'show']);
   Route::apiResource('/categories', CategoryController::class)->only(['index', 'show']);
});

