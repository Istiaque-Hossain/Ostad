<?php

namespace App\Http\Middleware;

use Closure;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->cookie('loginToken'))
        {
            $token = $request->cookie('loginToken');
        }
        elseif ($request->cookie('resetToken'))
        {
            $token = $request->cookie('resetToken');
        }
        else
        {
            // return Redirect::intended('/userLogin');
            return redirect('/userLogin');
        }


        $result = JWTToken::VerifyToken($token);

        if ($result == 'unauthorized')
        {
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ], 401);
        }
        else
        {
            $request->headers->set('email', $result->userEmail);
            $request->headers->set('id', $result->userId);
            return $next($request);

            // $response = $next($request);
            // $response->headers->set('email', $result);
            // return $response;

            // $response = $next($request);
            // return $response->header('email', $result);
        }
    }
}
