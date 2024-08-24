<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'app')->name('dashboard');
Route::view('/auth', 'auth')->name('auth');
Route::view('/projects', 'project/index')->name('project.index');
