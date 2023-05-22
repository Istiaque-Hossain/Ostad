<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function jsonresonse()
    {
        $data = [
            'message' => 'Success',
            'data' => [
                'name' => 'John Doe',
                'age' => 25,
            ],
        ];

        return response()->json($data, Response::HTTP_OK);
    }
}
