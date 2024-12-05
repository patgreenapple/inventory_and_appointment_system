<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        return view('masterdata.user');
    }
    
    public function getrecords() {
        return response()->json([
            'data' => User::leftJoin('roles', 'roles.id', 'users.role_id')->select('users.*', 'roles.name as role')->get(),
            'roles' => Roles::all(),
        ]);
    }   

    public function store(Request $request) { 
        $request->validate([
            'name'=> 'required',
        ],[
            'name.required' => 'Name is Required'
        ]);

        $data = isset($request->id) ? User::where('id', $request->id)->first() : new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile_number = $request->mobile_number;
        $data->address = $request->address;
        $data->role_id = $request->role_id;
        $data->save();

        return response()->json([ 'message' => 'Data Successfully Saved!']);
    }

    public function edit($id) { 
        return response()->json([
            'data' => User::where('id', $id)->first(),
        ]);
    }


    public function destroy($id) { 
        User::where('id', $id)->delete();
        return response()->json(['message' => 'Data Successfully Deleted!']);
    }


    public function change_password(Request $request) {
        $request->validate([
            'newPassword' => 'required',
            'confirmPassword' => 'required',
        ],[
            'newPassword.required' => 'The new password field is required',
            'confirmPassword.required' => 'The confirm password field is required',
        ]);

        $data = User::where('id', $request->user_id)->first();
        $newPassword = Hash::make($request->newPassword);
        $data->password = $newPassword;
        $data->save();
        return response()->json(['message' => 'Password Successfully Change'], 200);
    }
}
