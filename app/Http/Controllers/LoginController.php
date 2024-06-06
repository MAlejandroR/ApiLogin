<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function login(Request $request){


    }
    public function register (Request $request){
        info ("LoginRegister- register");
        info ($request->input());
        $request->validate([
            'name'=>"required",
            "email"=>"required",
            "password"=>"required|min:6|confirmed",
            "device_name"=>"required",
        ]);

        $user = new User($request->input());
        info ($user);

        $user->save();

        $token = $user->createToken('my-app-token')->plainTextToken;

        return response()->json(['token' => $token]);
    }
}
