<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediasController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NewsletterEmailsController;
use App\Http\Controllers\TemplatesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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
        return view('home');
    })->name('homePage');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/template', [TemplatesController::class, 'index'])->name('template');
    Route::get('/profile', [UserController::class, 'showProfile']);
    Route::put('/profile/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('dashboard.logout');
    Route::get('/medias', [MediasController::class, 'showMedias'])->name('show.medias');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard/changeRole', [DashboardController::class, 'changeRole'])->name('change.role');
    });

    Route::middleware((['role:admin|editor']))->group(function () {

        Route::get('/table', [UserController::class, 'showUserTable'])->name('Dashboard.table');
        Route::post('/medias', [MediasController::class, 'store'])->name('media.upload');
        Route::post('/template', [NewsletterController::class, 'save'])->name('create.template');
        Route::post('/template/send/{id}', [NewsletterController::class, 'send'])->name('send.mails');
        Route::delete('/delete/media/{id}', [MediasController::class, 'delete'])->name('delete.media');
        Route::post('/template/delete/{id}', [NewsletterController::class, 'delete'])->name('delete.mails');
        Route::post('/dashboard/update', [UserController::class, 'updateRole'])->name('update.role');
        Route::delete('/delete/user/{id}', [UserController::class, 'delete'])->name('delete.user');
        Route::delete('/delete/subscriber/{id}', [NewsletterEmailsController::class, 'delete'])->name('delete.subscriber');
        Route::patch('/users/restore/{id}', [UserController::class,'restore'])->name('users.restore');
    });

});









