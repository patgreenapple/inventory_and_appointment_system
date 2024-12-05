<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\Appointments;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppointmentsController extends Controller
{

    public function store_without_user(Request $request) {
        dd($request);
    }
    public function index() {
        return view('appointment');
    }
    
    public function getrecords() {
        $today = Carbon::today(); // Gets today's date
        $nextDay = $today->addDay()->toDateString(); // Adds 1 day to today's date
        $time_checker = Appointments::where('preferred_date', $nextDay)
        ->pluck('time') // Get only the 'time' column as an array
        ->toArray();
        $schedule = Schedule::first();
    
        $opening_time = $schedule['opening_time'];
        $closing_time = $schedule['closing_time'];
        
      
        $opening_hour = (int) date('G', strtotime($opening_time)); 
        $closing_hour = (int) date('G', strtotime($closing_time));
        
        $even_hours = [];
        
        for ($i = $opening_hour; $i <= $closing_hour; $i++) {
            // Check if the hour is even
            if ($i % 2 == 0) {
                // Add the hour with ":00" to the array
                $even_hours[] = sprintf("%02d:00", $i);  // Format hour as "HH:00"
            }
        }

        $available_hours = array_filter($even_hours, function ($time) use ($time_checker) {
            return !in_array($time, $time_checker); // Check if the time is not in the time_checker array
        });
        
        $available_hours = array_values($available_hours); // Reindex the array to reset keys
        return response()->json([
            'data' => Appointments::leftJoin('services', 'services.id', 'appointments.service_id')
            ->leftJoin('users', 'users.id', 'appointments.user_id')
            ->select('appointments.*', 'services.name as service_name', 'users.name as full_name', 'users.email' , 'users.mobile_number')
            ->get(),
            'services' => Services::get(),
            'user' => Auth::user(),
            'even_hours' => $available_hours,
        ]);
    }   

    public function store(Request $request) { 
        $request->validate([
            'service_id' => 'required',
            'appointment_date' => 'required',
            'appointment_time' => 'required',
        ],[
            'service_id.required' => 'Service is required',
            'appointment_date.required' => 'Appointment Date is required',
            'appointment_time.required' => 'Appointment Time is required',
        ]);
        $data = $request->id != null ? Appointments::where('id', $request->id)->first() : new Appointments();  
        $data->user_id = Auth::user()->id;
        $data->service_id = $request->service_id;
        $data->preferred_date = $request->appointment_date;
        $data->time = $request->appointment_time;
        $data->save();

        return response()->json([ 'message' => 'Data Successfully Saved!']);
    }

    public function edit($id) { 
        return response()->json([
            'data' => Appointments::where('appointments.id', $id)
            ->leftJoin('services', 'services.id', 'appointments.service_id')
            ->leftJoin('users', 'users.id', 'appointments.user_id')
            ->select('appointments.*', 'services.name as service_name', 'users.name as full_name', 'users.email' , 'users.mobile_number')
            ->first(),
        ]);
    }


    public function destroy($id) { 
        Appointments::where('id', $id)->delete();
        return response()->json(['message' => 'Data Successfully Deleted!']);
    }
}
