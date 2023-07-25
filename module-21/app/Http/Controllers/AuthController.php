<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password))
        {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // $token = JWT::encode(['user_id' => $user->id], env('JWT_SECRET'));

        $key = env('JWT_SECRET');
        $payload = [
            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time() + 60 * 60,
            'user_id' => $user->id
        ];
        $token =  JWT::encode($payload, $key, 'HS256');

        return response()->json(['token' => $token])->header('Authorization', 'Bearer ' . $token);
    }

    public function register(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // return $request->password;


        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        return response()->json(['message' => 'User registered successfully']);
    }
}
