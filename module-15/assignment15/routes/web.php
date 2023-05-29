<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;



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


Route::middleware(['auth.custom'])->group(function ()
{
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/settings', [SettingsController::class, 'show'])->name('settings');
});



// Route for displaying all products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Route for displaying the form to create a new product
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Route for storing a newly created product
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Route for displaying the form to edit an existing product
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Route for updating a specified product
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

// Route for deleting a specified product
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');



Route::get('/contact', function ()
{
    return view('contact');
});

Route::post('/contact', ContactController::class);
