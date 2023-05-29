<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;

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

Route::get('/', function ()
{
    return view('welcome');
});

// Route::resource('/register', RegisterController::class);
// Route::get('/users', function ()
// {
//     return view('registration');
// });

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/home', function ()
{
    return Redirect::to('/dashboard', 302);
});

// Route::middleware([])->group(function ()
// {
//     Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
//     Route::get('/settings', [SettingsController::class, 'show'])->name('settings');
// });

Route::middleware(['auth.custom'])->group(function ()
{
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/settings', [SettingsController::class, 'show'])->name('settings');
});