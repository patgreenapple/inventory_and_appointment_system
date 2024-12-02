<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index() {
        return view('masterdata.schedule');
    }
    
    public function getrecords() {
        return response()->json([
            'data' => Schedule::first(),
        ]);
    }   

    public function store(Request $request) { 
        // dd($request);
        $request->validate([
            'opening_time' => 'required',
            'closing_time' => 'required',
            'number_of_clients_per_day'=> 'required', 
        ],[
            'opening_time.required' => 'Opening Time is Required',
            'closing_time.required' => 'Closing Time is Required',
            'number_of_clients_per_day.required' => 'Number of Clients is Required',
        ]);

        $data = isset($request->id) ? Schedule::where('id', $request->id)->first() : new Schedule();
        $data->opening_time = $request->opening_time;
        $data->closing_time = $request->closing_time;
        $data->number_of_clients_per_day = $request->number_of_clients_per_day;
        $data->save();

        return response()->json([ 'message' => 'Data Successfully Saved!']);
    }

    public function edit($id) { 
        return response()->json([
            'data' => Schedule::where('id', $id)->first(),
        ]);
    }


    public function destroy($id) { 
        Schedule::where('id', $id)->delete();
        return response()->json(['message' => 'Data Successfully Deleted!']);
    }
}
