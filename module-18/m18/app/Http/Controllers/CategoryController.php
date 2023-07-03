<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function index()
    {
        return  Category::find(1)->getPost;
    }

    function latestPostByCategory($categoryId)
    {
        $category = Category::find($categoryId);
        $latestPost = $category->latestPost;
        return $latestPost;
    }

    function allPostByCategories()
    {
        $categories = Category::all();
        return view('all-post-by-cat', compact('categories'));
    }
}
