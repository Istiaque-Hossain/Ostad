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
    function UserRegistrationPage(Request $request)
    {
        $checkLogin = $request->cookie('loginToken');
        if ($checkLogin != null)
        {
            return redirect('dashboard');
        }
        return view('pages.auth.registration-page');
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


    function UserLoginPage(Request $request)
    {
        $checkLogin = $request->cookie('loginToken');
        if ($checkLogin != null)
        {
            return redirect('dashboard');
        }

        return view('pages.auth.login-page');
    }

    function UserLogin(Request $request)
    {
        $find = User::where('email', '=', $request->input('email'))
            ->where('password', '=', $request->input('password'))
            // ->count();
            ->select('id')->first();
        // return $find->id;

        if ($find !== null)
        {
            $token = JWTToken::CreateToken($request->input('email'), $find->id);

            return response()
                ->json([
                    'status' => 'success',
                    'message' => 'User Login Successful',
                ], 200)
                ->cookie('loginToken', $token, 60 * 60 * 24);
        }
        else
        {
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ], 401);
        }
    }


    function SendOTPToEmailPage()
    {
        return view('pages.auth.email-varify-page');
    }

    function SendOTPToEmail(Request $request)
    {
        $email = $request->input('email');
        // $otp = rand(1000, 9999);
        $otp = random_int(1000, 9999);
        $find = User::where('email', '=', $email)->count();

        if ($find == 1)
        {
            // OTP Email Address
            Mail::to($email)->send(new OTPMail($otp));
            // OTO Code Table Update
            User::where('email', '=', $email)->update(['otp' => $otp]);

            $token = JWTToken::CreateToken($email, 0);

            return response()->json([
                'status' => 'success',
                'message' => '4 Digit OTP Code has been send to your email !'
            ], 200)->cookie('get_email', $email, 60)->cookie('resetToken', $token, 60);
        }
        else
        {
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ], 401);
        }
    }


    function OTPVarifyPage()
    {
        return view('pages.auth.otp-varify-page');
    }

    function OTPVarify(Request $request)
    {
        $email = $request->cookie('get_email');
        $otp = $request->input('otp');

        $count = User::where('email', '=', $email)
            ->where('otp', '=', $otp)->count();

        if ($count == 1)
        {
            // Database OTP Update
            User::where('email', '=', $email)->update(['otp' => '0']);

            // Pass Reset Token Issue
            // $token = JWTToken::CreateToken($email);

            return response()->json([
                'status' => 'success',
                'message' => 'OTP Verification Successful',
            ], 200)
                // ->cookie('resetToken', $token, 60)
                ->cookie('get_email', null, -1);
        }
        else
        {
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized to Varify'
            ], 401);
        }
    }


    function ResetPasswordPage()
    {
        return view('pages.auth.reset-password-page');
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
            ], 200)->cookie('resetToken', null, -1);;
        }
        catch (Exception $exception)
        {
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ], 200);
        }
    }

    function dashboardPage()
    {
        return view('pages.dashboard.dashboard-page');
    }

    function UserLogout()
    {
        return redirect('/userLogin')->cookie('loginToken', '', -1);
    }


    function ProfilePage()
    {
        return view('pages.dashboard.profile-page');
    }

    function ProfileDetail(Request $request)
    {
        // dd();
        $email = $request->header('email');
        $user = User::where('email', '=', $email)->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Request Successful',
            'data' => $user
        ], 200);
    }

    function ProfileUpdate(Request $request)
    {
        try
        {
            $email = $request->header('email');
            // $firstName = $request->input('firstName');
            // $lastName = $request->input('lastName');
            // $mobile = $request->input('mobile');
            // $password = $request->input('password');

            User::where('email', '=', $email)->update([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                // 'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' => $request->input('password'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'User profile updated Successfully'
            ], 200);
        }
        catch (Exception $e)
        {
            return response()->json([
                'status' => 'failed',
                'message' => 'User Update Failed ! From Back-End'
            ], 400);
        }
    }
}
