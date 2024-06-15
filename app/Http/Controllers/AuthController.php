<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login sukses
            Session::put('username', $request->username);
            return redirect()->intended('dashboard');
        } else {
            // Jika login gagal
            return redirect()->back()->withErrors(['login' => 'Username atau password salah.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }
}
