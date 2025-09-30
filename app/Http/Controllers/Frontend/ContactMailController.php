<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class ContactMailController extends Controller
{
    public function store(ContactRequest $request)
    {
        $data = $request->validated();

        // Temporary send directly
        Mail::to('info@thejonaki.com')->send(new ContactMail($data));

        return response()->json([
            'success' => true,
            'message' => 'Your message has been sent successfully!',
        ]);
    }
}
