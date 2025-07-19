<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CalculatorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TweetsController;
use App\Http\Controllers\UserController;
use App\Models\Tweet;

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


Route::get('/calculator', [CalculatorController::class, 'index']);
    Route::post('/calculate', [CalculatorController::class, 'calculate'])->name('calculate');

Route::get('/calnew', function () {
    return view('calculator.calculatornew');
});
    Route::post('/calculatenew', [CalculatorController::class, 'calculateNew'])->name('calculatenew');

Route::get('/lists', [TweetsController::class, 'lists'])->middleware('auth')->name('lists');

Route::get('/explore', [TweetsController::class, 'explore'])->name('explore');

Route::get('/profile', [TweetsController::class, 'profile'])->middleware('auth')->name('profile');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

// Route::get('/profile/updatepage/{id}', [TweetsController::class, 'updatePage'])->name('updatepage');
// Route::put('/update/{id}', [TweetsController::class, 'update'])->name('update.user');

Route::resource('user', UserController::class);


//Route::get('/calculator', function () {
//    return view('calculator.calculator')->name('calculator');
//});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
    Route::get('/tweets', [TweetsController::class, 'index'])->name('home');
    Route::get('/tweet/{tweet}', [TweetsController::class, 'show'])->name('viewtweet');
    Route::post('/tweets', [TweetsController::class, 'store']);
});
// Route::middleware('auth')->group(function(){
//     Route::get('/tweets', 'TweetsController@index')->name('home');
//     Route::post('/tweets', 'TweetsController@store');
// });

//Rough
Route::get('test', [TweetsController::class, 'test']);
Auth::routes();
