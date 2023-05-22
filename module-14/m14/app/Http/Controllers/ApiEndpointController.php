<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiEndpointController extends Controller
{
    public function apiendpoint(Request $request)
    {
        $page = $request->query('page', null);
        return $page;
    }
}
