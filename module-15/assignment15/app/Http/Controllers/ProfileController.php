<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        echo "This is Profile page";
        // return view('welcome');
    }
}
