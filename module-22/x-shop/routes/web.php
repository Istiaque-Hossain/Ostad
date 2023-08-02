<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmailCampaignController;
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

// User API
Route::post('/userRegistration', [UserController::class, 'UserRegistration']);
Route::post('/userLogin', [UserController::class, 'UserLogin']);
Route::post('/sendOTPToEmail', [UserController::class, 'SendOTPToEmail']);
Route::post('/otpVarify', [UserController::class, 'OTPVarify'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/resetPassword', [UserController::class, 'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);

// Customer API
Route::post("/create-customer", [CustomerController::class, 'CustomerCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-customer", [CustomerController::class, 'CustomerList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-customer", [CustomerController::class, 'CustomerUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-customer", [CustomerController::class, 'CustomerDelete'])->middleware([TokenVerificationMiddleware::class]);

Route::get('/email-campaign/create', [EmailCampaignController::class, 'create'])->name('email-campaign.create');
Route::post('/email-campaign/send', [EmailCampaignController::class, 'send'])->name('email-campaign.send');
