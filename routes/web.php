<?php


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

Auth::routes(['reset'=>true]);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home');
Route::resource('empresa', EnterpriseController::class)->names('empresa');
Route::resource('proyecto', ProjectController::class);
Route::resource('anuncio', AnnouncementController::class);
Route::resource('editar-usuario', UserController::class)->names('user.password');

//Route::get('enviar',[MailController::class,'sendMail']);
