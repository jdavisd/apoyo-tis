<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
 //   return view('welcome');
//});

<<<<<<< HEAD
Auth::routes(['reset'=>true,]);
//if(){}
=======
Auth::routes(['reset'=>true]);
>>>>>>> 8e34fe4306456dc70ca0a599a9461227c0e867ac
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home');
Route::resource('empresa', EnterpriseController::class)->names('empresa');
Route::resource('proyecto', ProjectController::class);
Route::resource('anuncio', AnnouncementController::class);
<<<<<<< HEAD
Route::resource('editar-usuario', UserController::class)->names('user.password');
//Route::get('editar'/ Auth::user()->id(),UserController::class,'edit')->name('user.password');
=======
Route::resource('usuario', UserController::class);
>>>>>>> 8e34fe4306456dc70ca0a599a9461227c0e867ac
//Route::get('enviar',[MailController::class,'sendMail']);
