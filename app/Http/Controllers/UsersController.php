<?php

namespace App\Http\Controllers;

use App\Models\ApproveBooking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        $data = User::orderBy('created_at', 'DESC')->get();;
        if ($data) {
        return view('users', compact('data'));
        } else {
        return redirect('/users');
        }
    }

    public function store(Request $request){

        $requestData = $request->only([
            'user_id',
            'name',
            'email',
            'password',
            'role'
        ]);
        $user_id = $requestData['user_id'] ?? null;
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,' . $user_id . ',id,deleted_at,NULL',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = collect($validator->errors())->map(function($item) {
                return collect($item)->first();
            })->first();
             // Redirect dengan pesan flash
            return redirect('/users')->with('errors', $errors);
        }

        $data = User::updateOrCreate(
            ['id' => $user_id], // condition untuk mencari req yang akan diupdate
            [
                'name' => $requestData['name'],
                'email' => $requestData['email'],
                'password' => $requestData['password'],
                'role' => $requestData['role']
            ]
        );
        return redirect('/users')->with('success', "Success!");

    }

    public function delete(Request $request){
        $id = $request->input('id');
        // dd($id);
        $data = User::find($id);
        $count = ApproveBooking::where('user_id',$id)->count();
        if($count != 0 ){
            return redirect('/users')->with('errors', "This Account cannot deleted");
        }
        if($data){
            $data->delete();
            return redirect('/users')->with('success', "Success!");
        }else{
            return redirect('/users')->with('errors', "ID Not Found");
        }
    }
}
