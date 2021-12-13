<?php


use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProjectEnterpriseController;
use App\Http\Controllers\UserController;
use App\Models\ProjectEnterprise;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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


Auth::routes(['reset'=>true,'register'=>true,'login'=>true]);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home');
Route::resource('empresa', EnterpriseController::class)->names('empresa');
Route::resource('proyecto', ProjectController::class);
Route::resource('anuncio', AnnouncementController::class);
Route::resource('trabajos',ProjectEnterpriseController::class)->names('user.enterpriseproject');
Route::get('files/{filename}', function($filename) {
    return Storage::disk('local')->download('public/pagos'.'/'.$filename);
   // return back();
  })->name('file');

//Route::resource('editar-usuario', UserController::class)->names('user.password');

//Route::get('enviar',[MailController::class,'sendMail']);
