<?php

/* @param Class UsersController App\Http\Controllers\UsersController.php;
 * @param Class User App\Models\User.php;
 */

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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


Route::group(['prefix'=>'Usuario', 'controller' => UserController::class], function ()
{
    Route::get('/ver/{user}', 'show')->name('users.show');
    Route::get('/ver', 'showAllUsers')->name('users.show.allUsers');
});

Route::group(['prefix'=>'Libro', 'controller' => BookController::class], function ()
{
    Route::get('/ver/{user}', 'show')->name('books.show');
    Route::get('/ver', 'showAllBooks')->name('books.show.allBooks');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/libreria', function (){
    return view('opt1');
})->name('opt1');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'User', 'controller'=>LoginController::class], function (){
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::group(['prefix' => 'register', 'controller'=>RegisterController::class], function (){
    Route::get('/User', 'showRegistrationForm')->name('register');
    Route::post('/User', 'store')->name('register');
});

Route::group(['prefix' => 'password', 'controller'=>ForgotPasswordController::class], function(){
    Route::get('/reset', 'showLinkRequestForm')->name('password.request');
    Route::post('/email', 'sendResetLinkEmail')->name('password.email');
});

Route::group(['prefix' => 'reset', 'controller'=>ResetPasswordController::class], function(){
    Route::get('/password/{token}', 'showResetForm')->name('password.reset');
    Route::post('/password', 'reset')->name('password.update');
});

Route::group(['prefix' => 'confirm', 'controller'=>ConfirmPasswordController::class], function(){
    Route::get('/password', 'showConfirmForm')->name('password.confirm');
    Route::post('/password', 'confirm');
});

Route::group(['prefix'=>'verify', 'controller'=>VerificationController::class], function(){
    Route::get('/verify', 'show')->name('verification.notice');
    Route::get('/verify/{id}/{hash}', 'verify')->name('verification.verify');
    Route::post('/resend', 'resend')->name('verification.resend');
});
