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
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LendController;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

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


Route::group(['prefix'=>'User',  'middleware'=>[ 'auth' ], 'controller' => UserController::class], function ()
{
    Route::get('/ver/{User}', 'show')->name('user.show');
    Route::group(['prefix'=>'Root', 'middleware'=>['auth', 'role:admin']], function ()
    {
        Route::get('/ver', 'showAllUsers')->name('user.show.allUsers');
        Route::post('/store', 'store')->name('user.store');
        Route::delete('/delete/{User}', 'destroy')->name('user.destroy');
        Route::put('/edit/{User}', 'update')->name('user.update');
    });
});


Route::group(['prefix'=>'Book', 'middleware'=>['auth'], 'controller' => BookController::class], function ()
{
    Route::get('/ver/{User}', 'show')->name('book.show');
    Route::get('/ver', 'showBooks')->name('book.show.allBooks');
    Route::get('/list', 'index')->name('book.list');
    Route::group(['prefix'=>'Root', 'middleware'=>['auth', 'role:admin']], function ()
    {
        Route::post('/lend/{Book}', 'lendBook')->name('book.lend');
        Route::post('/store', 'store')->name('book.store');
        Route::delete('/delete/{Book}', 'destroy')->name('book.destroy');
        Route::put('/edit/{Book}', 'update')->name('book.update');
    });
});

Route::group(['prefix'=>'Lend', 'middleware'=>['auth'], 'controller' => LendController::class], function ()
{
    Route::get('/ver/{User}', 'show')->name('lend.show');
    Route::post('/store', 'store')->name('lend.store');
    Route::group(['prefix'=>'Root', 'middleware'=>['auth', 'role:admin']], function ()
    {
        Route::get('/list', 'index')->name('lend.list');
        Route::post('/lend/{Lend}', 'lendLend')->name('lend.lend');
        Route::delete('/delete/{Lend}', 'destroy')->name('lend.destroy');
        Route::put('/edit/{Lend}', 'update')->name('lend.update');
    });
});

Route::group(['prefix'=>'Category', 'middleware'=>['auth'],'controller' => CategoryController::class], function ()
{
    Route::get('/ver/{user}', 'showAllCategories');
    Route::get('/list', 'index');
    Route::group(['prefix'=>'Root', 'middleware'=>['auth', 'role:admin']], function ()
    {
        Route::post('/categoryCreate', 'store');
        Route::delete('/categoryDelete/{Category}', 'destroy');
        Route::put('/categoryUpdate/{Category}', 'update');
    });
});

Route::group(['prefix'=>'Author','controller' => AuthorController::class], function ()
{
    Route::get('/ver/{user}', 'showAllAuthors');
    Route::get('/ver', 'showAllAuthors');
    Route::get('/list', 'index');
    Route::group(['prefix'=>'Root', 'middleware'=>['auth', 'role:admin']], function ()
    {
        Route::post('/authorsCreate', 'store');
        Route::delete('/authorsDelete/{Author}', 'destroy');
        Route::put('/authorsUpdate/{Author}', 'update');
    });
});

Route::get('/', function () {
    return view('home');
});



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

Route::group(['prefix' => 'reset', 'middleware'=>[ 'auth' ],  'controller'=>ResetPasswordController::class], function(){
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
