<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Get the form data
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        // Send email
        $to = 'admin@istiaquehossain.com'; // Replace with your predefined email address
        Mail::to($to)->send(new ContactFormMail($name, $email, $message));

        // Redirect back with success message
        return redirect()->back()->with('success', 'Thank you for your message. We will get back to you soon.');
    }
}
