<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventsController;

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



Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/events', [EventsController::class, 'index']);
Route::get('/events/create', [EventsController::class, 'create']);
Route::post('/events', [EventsController::class, 'store']);
Route::get('/events/{event}', [EventsController::class, 'show']);
Route::get('/events/{event}/edit', [EventsController::class, 'edit']);
Route::post('/events/{event}/update', [EventsController::class, 'update']);
Route::delete('/events/{event}', [EventsController::class, 'destroy']);