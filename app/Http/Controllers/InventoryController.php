<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Inventory;
use App\Models\ItemCategory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index() {
        return view('inventory');
    }
    
    public function getrecords() {
        return response()->json([
            'item_categories' => ItemCategory::all(),
            'data' => Inventory::leftJoin('items', 'items.id', 'inventories.item_id')->select('inventories.*', 'items.name as item_name')->get(),
        ]);
    }   

    public function store(Request $request) { 
        // dd($request);
        $request->validate([
            'item_id' => 'required',
        ],[
            'item.required' => 'Item is Required',
        ]);

        $data = isset($request->id) ? Inventory::where('id', $request->id)->first() : new Inventory();
        $data->item_id = $request->item_id;
        $data->quantity = $request->quantity;
        $data->price = $request->price;
        $data->save();

        return response()->json([ 'message' => 'Data Successfully Saved!']);
    }

    public function edit($id) { 
        $data = Inventory::leftJoin('items', 'items.id', 'inventories.item_id')
        ->leftJoin('item_categories', 'item_categories.id', 'items.item_category_id')
        ->where('inventories.id', $id)
        ->select('inventories.id', 'item_categories.id as item_category_id', 'inventories.item_id' ,'inventories.quantity', 'inventories.price')
        ->first();

        $items = Item::get();

        return response()->json([
            'data' => $data,
            'items' => $items
        ]);
    }


    public function destroy($id) { 
        Inventory::where('id', $id)->delete();
        return response()->json(['message' => 'Data Successfully Deleted!']);
    }

    public function getitemsbyitemcategories($id) { 
        return response()->json([
            'items' => Item::where('item_category_id', $id)->get(),
        ]);
    }
}
