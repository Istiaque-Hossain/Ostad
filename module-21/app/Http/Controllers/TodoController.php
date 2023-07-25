<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('jwt', ['except' => ['index']]);
    // }

    public function index(Request $request)
    {
        $user_id = $request->user_id;
        $todos = Todo::where('user_id', $user_id)->get();
        return response()->json($todos);
    }

    public function store(Request $request)
    {
        $user_id = $request->user_id;
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $data['user_id'] = $user_id;
        $todo = Todo::create($data);
        return response()->json($todo, 201);
    }

    public function update(Request $request, $id)
    {
        $user_id = $request->user_id;
        $todo = Todo::where('user_id', $user_id)->find($id);

        if (!$todo)
        {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $todo->update($data);
        return response()->json($todo);
    }

    public function destroy(Request $request, $id)
    {
        $user_id = $request->user_id;
        $todo = Todo::where('user_id', $user_id)->find($id);

        if (!$todo)
        {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        $todo->delete();
        return response()->json(['message' => 'Todo deleted successfully']);
    }
}