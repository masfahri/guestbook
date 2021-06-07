<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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

Route::get('/', function (){ return redirect('/login');} )->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, '_login'])->name('do_login');

Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, '_register'])->name('do_register');

// Route::prefix(['middleware' => 'auth'])->group(function () {
//     // Route::get('home', [AuthController::class, 'showFormRegister'])->name('register');
//     // Route::get('home', [AuthController::class, 'showFormRegister'])->name('register');
// });


