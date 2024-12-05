<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index_without_user() {
        return view('client.contact_us.contact_us'); 
    }
    
    public function store_without_user(Request $request) {
        dd($request);
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

    public function index() {
        return view('inquiry');
    }
    
    public function getrecords() {
        return response()->json([
            'data' => ContactUs::all(),
        ]);
    }   

    public function store(Request $request) { 
        $request->validate([
            'name'=> 'required',
        ],[
            'name.required' => 'Name is Required'
        ]);

        $data = isset($request->id) ? ContactUs::where('id', $request->id)->first() : new ContactUs();
        $data->name = $request->name;
        $data->save();

        return response()->json([ 'message' => 'Data Successfully Saved!']);
    }

    public function edit($id) { 
        return response()->json([
            'data' => ContactUs::where('id', $id)->first(),
        ]);
    }


    public function destroy($id) { 
        ContactUs::where('id', $id)->delete();
        return response()->json(['message' => 'Data Successfully Deleted!']);
    }
    
}
