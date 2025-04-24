<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function registration()
    {
        return view("registration");
    }

    public function create(Request $request)
    {
        $credentials = $request->validate([
            "first_name" => "required|string",
            "last_name" => "required|string",
            "phone" => "required|string|unique:users",
            "email" => "required|string|email|unique:users",
            "password" => "required|confirmed|min:8"
        ]);

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $phone = $request->phone;
        $email = $request->email;
        $password = Hash::make($request->password);

        $user = DB::insert("INSERT INTO users (first_name, last_name, phone, email, password) 
                                        VALUES ('$first_name', '$last_name', '$phone', '$email', '$password')");

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route("home");
        }
    }
}
