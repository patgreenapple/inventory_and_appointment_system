<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index() {
        return view('masterdata.roles');
    }
    
    public function getrecords() {
        return response()->json([
            'data' => Roles::all(),
        ]);
    }   

    public function store(Request $request) { 
        // dd($request);
        $request->validate([
            'name'=> 'required',
        ],[
            'name.required' => 'Name is Required'
        ]);

        $data = isset($request->id) ? Roles::where('id', $request->id)->first() : new Roles();
        $data->name = $request->name;
        $data->save();

        return response()->json([ 'message' => 'Data Successfully Saved!']);
    }

    public function edit($id) { 
        return response()->json([
            'data' => Roles::where('id', $id)->first(),
        ]);
    }


    public function destroy($id) { 
        Roles::where('id', $id)->delete();
        return response()->json(['message' => 'Data Successfully Deleted!']);
    }
}
