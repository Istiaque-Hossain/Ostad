<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Mail\PromotionalEmail;
use Illuminate\Support\Facades\Mail;

class EmailCampaignController extends Controller
{
    public function send(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => 'required|string',
            'content' => 'required|string',
            'customers' => 'required|array',
        ]);

        $subject = $validatedData['subject'];
        $content = $validatedData['content'];
        $selectedCustomers = $validatedData['customers'];

        $selectedCustomers = Customer::whereIn('id', $selectedCustomers)->get();

        foreach ($selectedCustomers as $customer)
        {
            Mail::to($customer->email)->send(new PromotionalEmail($subject, $content));
        }

        return redirect()->route('email-campaign.create')->with('success', 'Email campaign sent successfully!');
    }

    public function create()
    {
        $customers = Customer::all(); // Assuming you have the Customer model created
        return view('create_email_campaign', compact('customers'));
    }
}
