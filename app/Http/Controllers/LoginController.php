<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (!isset($email) || !isset($password)) {
            return redirect()->route("login")->with("message", "メールアドレスまたはパスワードが正しくありません。");
        }
        if (Auth::attempt(["email" => $email, "password" => $password])) {
            $request->session()->regenerate();
            return redirect()->intended(route("menu"));
        }
        return redirect()->route("login")->with("message", "メールアドレスまたはパスワードが正しくありません。1111");


    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("login");

    }

}
