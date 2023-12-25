<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //Register user
    public function register_admin(Request $request){

        if($request->password!==$request->password2){
            return  redirect('/register')->with('msg','Password Does not match');

        }else{
         $admin=new User();
         $admin->name = $request->username;
         $admin->email=$request->email;
         $admin->password=Hash::make($request->password);

        $admin->save();
        return  redirect('/login')->with('msg','Admin registred successfully');   
        }
        
    }


    // Login user
    public function login_admin(Request $request){

        // Validate credentials
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect('/')->with('msg', 'Login successful');
        } else {
            // Authentication failed
            return redirect('/login')->with('msg', 'Invalid credentials');
        }
    }

}

