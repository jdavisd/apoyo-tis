<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\ProjectController;

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

Auth::routes(['reset'=>false]);
//Route::get('/', function () {
//    return route('login');
//});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home');
Route::resource('empresa', EnterpriseController::class)->names('empresa');
Route::resource('proyecto', ProjectController::class);
