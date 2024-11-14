<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function index(){
        return view('auth.boxed-signin');
    }

    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = collect($validator->errors())->map(function($item) {
                return collect($item)->first();
            })->first();
             // Redirect dengan pesan flash
            return redirect('/auth/login')->with('errors', $errors);
        }

        $data = User::where('email',$email)->first();

        if($data->password == $password){
            $request->session()->put('authenticated', true);
            $request->session()->put('id', $data->id);
            $request->session()->put('email', $data->email);
            $request->session()->put('name', $data->name);
            $request->session()->put('role', $data->role);

            return redirect('/')->with('success', 'Login Successful!');
        }else{
            return redirect('/auth/login')->with('errors', "Wrong Password");
        }
        
    }

    public function logout(Request $request)
  {
    $request->session()->flush();
    return redirect('/auth/login')->with('success', 'You have been logged out!');
  }
}
