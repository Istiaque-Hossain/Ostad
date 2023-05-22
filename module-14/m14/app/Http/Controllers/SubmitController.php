<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

use Illuminate\Http\Request;

class SubmitController extends Controller
{
    public function submit(Request $request)
    {
        $name = $request->input('name');
        $data = [

            "success" => true,
            "message" => "Form submitted successfully.",

        ];

        return response()->json($data, Response::HTTP_OK);
    }
}
