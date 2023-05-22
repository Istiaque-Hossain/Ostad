<?php

use App\Http\Controllers\ApiEndpointController;
use App\Http\Controllers\UserAgent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubmitController;
use App\Http\Controllers\TokenController;

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


Route::get('/useragent', [UserAgent::class, 'uAgent']);

Route::get('/form', function ()
{
    return view('form');
});
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/api/endpoint', [ApiEndpointController::class, 'apiendpoint']);

Route::get('/json', [JsonController::class, 'jsonresonse']);

Route::get('/rtoken', [TokenController::class, 'rtoken']);

Route::get('/formsubmit', function ()
{
    return view('formsubmit');
});
Route::post('/submit', [SubmitController::class, 'submit'])->name('submit');
