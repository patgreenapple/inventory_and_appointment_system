<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        return view('masterdata.item');
    }
    
    public function getrecords() {
        return response()->json([
            'item_categories' => ItemCategory::all(),
            'data' => Item::leftJoin('item_categories', 'item_categories.id', 'items.item_category_id')->select('items.*', 'item_categories.name as item_category_name')->get(),
        ]);
    }   

    public function store(Request $request) { 
        // dd($request);
        $request->validate([
            'item_category_id' => 'required',
            'name'=> 'required',
        ],[
            'item_category_id.required' => 'Item Category is Required',
            'name.required' => 'Name is Required'
        ]);

        $data = isset($request->id) ? Item::where('id', $request->id)->first() : new Item();
        $data->item_category_id = $request->item_category_id;
        $data->name = $request->name;
        $data->save();

        return response()->json([ 'message' => 'Data Successfully Saved!']);
    }

    public function edit($id) { 
        return response()->json([
            'data' => Item::where('id', $id)->first(),
        ]);
    }


    public function destroy($id) { 
        Item::where('id', $id)->delete();
        return response()->json(['message' => 'Data Successfully Deleted!']);
    }
}
