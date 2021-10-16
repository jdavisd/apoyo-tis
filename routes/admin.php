<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;

use Illuminate\Support\Facades\Route;
Route::get('', [HomeController::class,'index'] )->name('admin.home');
Route::resource('usuarios', UserController::class)->names('admin.users');