<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/register', [RegisterController::class, 'show'])->name('Auth.register');
Route::post('/register', [RegisterController::class, 'store'])->name('Auth.registerTrait');

Route::get('/login', [LoginController::class, 'show'])->name('Auth.login');
Route::post('/login', [LoginController::class, 'login'])->name('Auth.loginTrait');

Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth');
