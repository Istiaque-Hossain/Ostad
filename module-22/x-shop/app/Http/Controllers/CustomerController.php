<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function CustomerCreate(Request $request)
    {
        $userId = $request->header('id');
        $result = Customer::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'user_id' => $userId
        ]);
        return $result;
    }

    function CustomerList(Request $request)
    {
        $user_id = $request->header('id');
        return Customer::where('user_id', $user_id)->get();
    }

    function CustomerUpdate(Request $request)
    {
        $user_id = $request->header('id');
        $id = $request->input('id');

        Customer::where('user_id', $user_id)->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'user_id' => $user_id,
            ]);
    }

    function CustomerDelete(Request $request)
    {
        $user_id = $request->header('id');
        $customer_id = $request->input('id');
        Customer::where('user_id', $user_id)->where('id', $customer_id)->delete();
    }
}
