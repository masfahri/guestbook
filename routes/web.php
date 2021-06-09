<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TamuController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function (){ return redirect('home');} )->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, '_login'])->name('do_login');

Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, '_register'])->name('do_register');

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::post('tamu', [TamuController::class, 'store'])->name('tamu.store');


// Route::group(['middleware' => 'auth'], function () {
 
//     Route::get('home', [HomeController::class, 'index'])->name('home');
//     Route::post('tamu', [TamuController::class, 'store'])->name('tamu.store');
//     Route::get('logout', [AuthController::class, '_logout'])->name('logout');

 
// });



