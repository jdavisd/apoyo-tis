<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ImportuserController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;
Route::get('', [HomeController::class,'index'] )->middleware('can:admin.home')->name('admin.home');
Route::resource('users', UserController::class)->middleware('can:admin.users')->names('admin.users');
Route::resource('roles', RoleController::class)->middleware('can:admin.roles')->names('admin.roles');
Route::resource('usersimport',ImportuserController::class)->middleware('can:admin.import.users')->names('admin.usersimport');