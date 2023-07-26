<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = trim($request->header('Authorization'));
        // dd($token);
        $token = str_replace('Bearer ', '', $token);

        if (!$token)
        {
            return response()->json(['message' => 'Token not provided'], 401);
        }

        try
        {
            $key = env('JWT_SECRET');
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            // $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));
            // $decoded = JWT::decode($token, [env('JWT_SECRET'), 'HS256']);
            $request->merge(['user_id' => $decoded->user_id]);
        }
        catch (Exception $e)
        {
            \Log::error('JWT Decoding Error: ' . $e->getMessage());
            return response()->json(['message' => 'Invalid token'], 401);
        }

        return $next($request);
    }
}
