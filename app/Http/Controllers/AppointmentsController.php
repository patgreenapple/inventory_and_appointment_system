<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function index() {
        return view('appointment');
    }
    
    public function getrecords() {
        return response()->json([
            // 'item_categories' => ItemCategory::all(),
            'data' => Appointments::get(),
        ]);
    }   

    public function store(Request $request) { 
        // dd($request);
        // $request->validate([
        //     'item_id' => 'required',
        // ],[
        //     'item.required' => 'Item is Required',
        // ]);

        // $data = isset($request->id) ? Inventory::where('id', $request->id)->first() : new Inventory();
        // $data->item_id = $request->item_id;
        // $data->quantity = $request->quantity;
        // $data->price = $request->price;
        // $data->save();

        return response()->json([ 'message' => 'Data Successfully Saved!']);
    }

    public function edit($id) { 
        return response()->json([
            'data' => Appointments::where('id', $id)->first(),
        ]);
    }


    public function destroy($id) { 
        Appointments::where('id', $id)->delete();
        return response()->json(['message' => 'Data Successfully Deleted!']);
    }
}
