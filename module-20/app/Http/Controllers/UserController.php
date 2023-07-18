<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Mail\OTPMail;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    function UserLogin(Request $request)
    {
        $find = User::where('email', '=', $request->input('email'))
            ->where('password', '=', $request->input('password'))
            ->count();

        if ($find == 1)
        {
            $token = JWTToken::CreateToken($request->input('email'));

            return response()->json([
                'status' => 'success',
                'message' => 'User Login Successful',
            ], 200)->cookie('loginToken', $token, 60 * 60 * 24);
        }
        else
        {
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ], 401);
        }
    }

    function UserRegistration(Request $request)
    {
        try
        {
            User::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' => $request->input('password'),
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'User Registration Successfully'
            ], 200);
        }
        catch (Exception $e)
        {
            return response()->json([
                'status' => 'failed',
                'message' => 'User Registration Failed ! From Back-End'
            ], 400);
        }
    }

    function SendOTPToEmail(Request $request)
    {
        $email = $request->input('email');
        $otp = rand(1000, 9999);
        $find = User::where('email', '=', $email)->count();

        if ($find == 1)
        {
            // OTP Email Address
            Mail::to($email)->send(new OTPMail($otp));
            // OTO Code Table Update
            User::where('email', '=', $email)->update(['otp' => $otp]);

            return response()->json([
                'status' => 'success',
                'message' => '4 Digit OTP Code has been send to your email !'
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ], 401);
        }
    }

    function OTPVarify(Request $request)
    {
        $email = $request->input('email');
        $otp = $request->input('otp');
        $count = User::where('email', '=', $email)
            ->where('otp', '=', $otp)->count();
        if ($count == 1)
        {
            // Database OTP Update
            User::where('email', '=', $email)->update(['otp' => '0']);

            // Pass Reset Token Issue
            $token = JWTToken::CreateToken($request->input('email'));

            return response()->json([
                'status' => 'success',
                'message' => 'OTP Verification Successful',
            ], 200)->cookie('resetToken', $token, 60);
        }
        else
        {
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ], 401);
        }
    }

    function ResetPassword(Request $request)
    {
        try
        {
            $email = $request->header('email');
            $password = $request->input('password');
            User::where('email', '=', $email)->update(['password' => $password]);
            // Remove Cookie...
            return response()->json([
                'status' => 'success',
                'message' => 'Password Reset Successful',
            ], 200);
        }
        catch (Exception $exception)
        {
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ], 200);
        }
    }

    function ProfileUpdate()
    {
    }
}
