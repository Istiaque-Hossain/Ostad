<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function rtoken(Request $request)
    {
        $rememberToken = $request->cookie('remember_token', null);
        // return ['rememberToken' => $rememberToken];
        // return $rememberToken;
    }
}
