<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/UserLogin', [UserController::class, 'UserLogin']);
Route::post('/UserRegistration', [UserController::class, 'UserRegistration']);
Route::post('/SendOTPToEmail', [UserController::class, 'SendOTPToEmail']);
Route::post('/OTPVarify', [UserController::class, 'OTPVarify']);
Route::post('/ResetPassword', [UserController::class, 'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/ProfileUpdate', [UserController::class, 'ProfileUpdate']);
