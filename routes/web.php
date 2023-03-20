<?php

use App\Http\Controllers\CallbackController;
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

Route::view('/', 'llista-tallers')->name('home');

Route::view('/login', 'login')->name('login');
Route::view('/signup', 'signup')->name('signup');

Route::view('/nouTaller', 'nou-taller')->name('nou-taller');
Route::view('/llistaTallers', 'llista-tallers')->name('llista-tallers');

Route::view('/welcome', 'welcome')->name('welcome');

 
Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('redirect');
 
Route::get('/auth/callback', CallbackController::class)->name('callback');