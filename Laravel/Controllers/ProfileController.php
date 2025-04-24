<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $user_id = Auth::user()->id;

        $user = DB::select("SELECT * FROM users WHERE $user_id = id LIMIT 1");

        foreach ($user as $value) {
            $user_at = $value->create_at;
        }

        $datetime = explode(" ", $user_at);
        $date = date("d.m.Y", strtotime($datetime[0]));

        return view("profile", ["user" => $user], compact("date"));
    }

    public function newPassword(Request $request)
    {
        $credentials = $request->validate([
            "old_password" => "required",
            "password" => "required|confirmed|min:8"
        ]);

        $old_password = auth()->user()->password;
        $old_password_conf = $request->old_password;
        $new_password = $request->password;

        if (Hash::check($old_password_conf, $old_password)) {
            if (Hash::check($new_password, $old_password)) {
                return back()->withErrors(["password" => "Пароль не должен совпадать с уже существующим"]);
            }

            $new_password = Hash::make($new_password);
            $user_id = Auth::user()->id;
            DB::update("UPDATE users SET password = '$new_password' WHERE id = $user_id");

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route("authorization");
        }

        return back()->withErrors(["old_password" => "Не верный пароль"]);
    }
}
