<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethods;
use Illuminate\Http\Request;

class PaymentMethodsController extends Controller
{
    public function index() {
        return view('masterdata.payment_method');
    }
    
    public function getrecords() {
        return response()->json([
            'data' => PaymentMethods::all(),
        ]);
    }   

    public function store(Request $request) { 
        $request->validate([
            'name'=> 'required',
        ],[
            'name.required' => 'Name is Required'
        ]);

        $data = isset($request->id) ? PaymentMethods::where('id', $request->id)->first() : new PaymentMethods();
        $data->name = $request->name;
        $data->mobile_number = $request->mobile_number;
        $data->save();

        return response()->json([ 'message' => 'Data Successfully Saved!']);
    }

    public function edit($id) { 
        return response()->json([
            'data' => PaymentMethods::where('id', $id)->first(),
        ]);
    }


    public function destroy($id) { 
        PaymentMethods::where('id', $id)->delete();
        return response()->json(['message' => 'Data Successfully Deleted!']);
    }
}
