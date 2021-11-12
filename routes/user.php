<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/password', UserController::class)->middleware('can:user.password.edit')->names('user.password');