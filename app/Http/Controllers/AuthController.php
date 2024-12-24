<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('login', [
            "title" => "Login",
            "active" => "login"
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            "name" => "required",
            "password" => "required",
        ]);

        $remember = $request->boolean('remember');
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect("/dashboard")->with("success", "Berhasil masuk sebagai ".Auth::user()->name);
        } else {
            return back()->with("error", "Username atau password salah");
        }
    }

    public function logout(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();
        return redirect("/")->with("success", "Berhasil logout");
    }
}
