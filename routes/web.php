<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'app')->name('dashboard');
Route::view('/auth', 'auth')->name('auth');
Route::view('/projects', 'projects/index')->name('projects.index');
Route::view('/projects/create', 'projects/create')->name('projects.create');
Route::view('/categories', 'categories/index')->name('categories.index');
Route::view('/categories/create', 'categories/create')->name('categories.create');
Route::view('/users', 'users/index')->name('users.index');
