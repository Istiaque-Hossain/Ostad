<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;

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

Route::get('/post', [PostController::class, 'index']);
Route::get('/cat', [CategoryController::class, 'index']);
Route::get('/allpost', [PostController::class, 'getAllPostWithCat']);
Route::get('/allpostcount/{id}', [PostController::class, 'getCountPost']);
Route::get('/posts/{id}/delete', [PostController::class, 'deltPost']);
Route::get('/posts/trash', [PostController::class, 'trashPost']);
Route::get('/categories/{id}/posts', [PostController::class, 'getPostsByCategoryId']);
Route::get('/categories/{id}/latestposts', [CategoryController::class, 'latestPostByCategory']);
Route::get('/categories/latestposts', [CategoryController::class, 'allPostByCategories']);
