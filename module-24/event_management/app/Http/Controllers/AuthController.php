<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        Auth::login($user);

        // return redirect()->route('home')->with('success', 'User created successfully!');
        return 'User created successfully!';
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials))
        {
            return redirect()->route('login')->with('error', 'Invalid email or password!');
        }

        // return redirect()->route('home');
        return 'User Login successfully!';
    }

    public function logout()
    {
        Auth::logout();

        // return redirect()->route('home');
        return 'User Logout successfully!';
    }
}
