<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index() {
        return view('masterdata.services');
    }
    
    public function getrecords() {
        return response()->json([
            'data' => Services::all(),
        ]);
    }   

    public function store(Request $request) { 
        // dd($request);
        $request->validate([
            'name'=> 'required',
        ],[
            'name.required' => 'Name is Required'
        ]);

        $data = isset($request->id) ? Services::where('id', $request->id)->first() : new Services();
        $data->name = $request->name;
        $data->save();

        return response()->json([ 'message' => 'Data Successfully Saved!']);
    }

    public function edit($id) { 
        return response()->json([
            'data' => Services::where('id', $id)->first(),
        ]);
    }


    public function destroy($id) { 
        Services::where('id', $id)->delete();
        return response()->json(['message' => 'Data Successfully Deleted!']);
    }
}
