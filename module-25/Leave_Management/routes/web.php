<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LeaveRequestController;

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

Route::get('/login', [AuthController::class, 'LoginPage']);
Route::post('/login', [AuthController::class, 'Login']);
Route::get('/logout', [AuthController::class, 'Logout']);

Route::group(['middleware' => 'auth'], function ()
{
    Route::get('/leave-requests', [LeaveRequestController::class, 'Index']);
    Route::get('/leave-requests/create', [LeaveRequestController::class, 'Create']);
    Route::post('/leave-requests', [LeaveRequestController::class, 'Store']);
    Route::get('/leave-requests/{leaveRequest}', [LeaveRequestController::class, 'Show']);
    Route::get('/leave-requests/{leaveRequest}/edit', [LeaveRequestController::class, 'Edit']);
    Route::put('/leave-requests/{leaveRequest}', [LeaveRequestController::class, 'Update']);
    Route::delete('/leave-requests/{leaveRequest}', [LeaveRequestController::class, 'Destroy']);
});
