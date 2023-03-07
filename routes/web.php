<?php

/* @param Class UsersController App\Http\Controllers\UsersController.php;
 * @param Class User App\Models\User.php;
 */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

Route::group(['/LogUser', 'controller' => UsersController::class], function ()
{
    Route::get('/LogUser', function ()
    {
        return view('login');
    })->name('signIn');
    Route::post('/LogUser', [UsersController::class, 'store'])->name('signUp');
});
Route::get('/', function () {
    return view('index');
});

Route::get('/libreria', function (){
    return view('opt1');
})->name('opt1');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
