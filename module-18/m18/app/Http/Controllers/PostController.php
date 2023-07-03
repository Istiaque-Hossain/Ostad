<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function index()
    {
        return Post::find(1)->category;
    }

    function getAllPostWithCat()
    {
        $posts = Post::with('category')->get();
        // return $posts;
        // return view('all-post-template')->with($posts);
        return view('all-post-template', compact('posts'));

        // foreach ($posts as $post)
        // {


        //     echo "Post ID: " . $post->id . "<br>";
        //     echo "Post Title: " . $post->title . "<br>";
        //     echo "Post Category Detail: " . $post->category . "<br>";
        //     // Accessing the associated category
        //     // if ($post->category)
        //     // {
        //     //     echo "Category ID: " . $post->category->id . "<br>";
        //     //     echo "Category Name: " . $post->category->name . "<br>";
        //     //     echo "Category Created At: " . $post->category->created_at . "<br>";
        //     //     echo "Category Updated At: " . $post->category->updated_at . "<br>";
        //     // }
        //     // else
        //     // {
        //     //     echo "No category found for this post.<br>";
        //     // }
        //     echo "<br>";
        // }
    }

    function getCountPost($categoryId)
    {
        $categoryCount = Post::getCountByCategoryId($categoryId);
        echo 'Post Count for cat [id ' . $categoryId . '] =' . $categoryCount;
    }

    function deltPost($id)
    {
        $post = Post::find($id);
        $post->delete();
        echo "Post has been DELETED ";
    }
    function trashPost()
    {
        $post = Post::onlyTrashed()->get();
        return $post;
    }
}
