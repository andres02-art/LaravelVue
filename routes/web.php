<?php

/* @param Class UsersController App\Http\Controllers\UsersController.php;
 * @param Class User App\Models\User.php;
 */
use App\http\Controllers\UsersController;
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

Route::group(['/LogUser', 'controller' => UsersController::class], function ()
{
    Route::get('/LogUser', function ()
    {
        return view('login');
    })->name('signIn');
    Route::post('/LogUser', [UsersController::class, 'create'])->name('signUp');
});
Route::get('/', function () {
    return view('index');
});

Route::get('/libreria', function (){
    return view('opt1');
})->name('opt1');
