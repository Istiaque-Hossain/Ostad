<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'cmnt' => 'required',
        ]);

        $post = Post::find($id);

        $comment = new Comment();
        $comment->name = $validateData['name'];
        $comment->email = $validateData['email'];
        $comment->cmnt = $validateData['cmnt'];

        $result = $post->post_comments()->save($comment);
        return response()->json($comment, 201);
    }
}
