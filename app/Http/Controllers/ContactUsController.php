<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index() {
        return view('client.contact_us.contact_us'); 
    }
    
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $data = new ContactUs();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->message = $request->message;
        $data->save();

        return redirect()->back()->with('message', 'Thank you very much for your message. We will get back to you when we read the message. Thank you!');
    }
}
