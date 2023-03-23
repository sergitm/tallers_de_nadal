<?php

use App\Http\Controllers\CallbackController;
use App\Http\Controllers\TallerController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::resource('/taller', TallerController::class);

Route::view('/', 'tallers.llista-tallers')->name('home');

Route::view('/login', 'login')->name('login');


 
Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('redirect');
 
Route::get('/auth/callback', CallbackController::class)->name('callback');