<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{
    public function index() {
        return view('masterdata.itemcategory');
    }
    
    public function getrecords() {
        return response()->json([
            'data' => ItemCategory::all(),
        ]);
    }   

    public function store(Request $request) { 
        // dd($request);
        $request->validate([
            'name'=> 'required',
        ],[
            'name.required' => 'Name is Required'
        ]);

        $data = isset($request->id) ? ItemCategory::where('id', $request->id)->first() : new ItemCategory();
        $data->name = $request->name;
        $data->save();

        return response()->json([ 'message' => 'Data Successfully Saved!']);
    }

    public function edit($id) { 
        return response()->json([
            'data' => ItemCategory::where('id', $id)->first(),
        ]);
    }


    public function destroy($id) { 
        ItemCategory::where('id', $id)->delete();
        return response()->json(['message' => 'Data Successfully Deleted!']);
    }

}
