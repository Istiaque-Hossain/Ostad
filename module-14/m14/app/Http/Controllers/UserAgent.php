<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAgent extends Controller
{
    public function uAgent(Request $request)
    {
        $userAgent = $request->userAgent();
        return $userAgent;
    }
}
