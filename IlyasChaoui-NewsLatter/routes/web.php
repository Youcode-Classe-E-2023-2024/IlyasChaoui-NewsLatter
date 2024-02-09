<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\NewsletterEmailsController;
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
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'show'])->name('Auth.register');
    Route::post('/register', [RegisterController::class, 'store'])->name('Auth.registerTrait');

    Route::get('/login', [LoginController::class, 'show'])->name('Auth.login');
    Route::post('/login', [LoginController::class, 'login'])->name('Auth.loginTrait');

    Route::get('/forgetPassword', [ForgetPasswordController::class, 'show'])->name('Auth.forgetPassword');
    Route::post('/forgetPassword', [ForgetPasswordController::class, 'store'])->name('Auth.forgetPasswordTrait');

    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'show'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::post('/subscribe', [NewsletterEmailsController::class, 'subscribe'])->name('subscribeTrait');

    Route::get('/', function () {
        return response()
            ->view('home')
            ->header('Cache-Control', 'no-store, no-cache, max-age=0');
    })->name('homePage');
});


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [NewsletterEmailsController::class, 'index'])->name('subscribe');

    Route::post('/logout', [LoginController::class, 'destroy'])->name('dashboard.logout');

});


//Route::post('/delete', [NewsletterEmailsController::class, 'delete'])->name('unsubscribe');




