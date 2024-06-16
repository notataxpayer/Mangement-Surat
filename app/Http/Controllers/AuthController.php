<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'required|string',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('name', 'password');
        $hashedPassword = Hash::make($request->password);

        if (Auth::attempt($credentials)) {
            // Jika login sukses
            Session::put('name', $request->name);
            return redirect()->intended('/surats');
        } else {
            // Jika login gagal
            return redirect()->back()->withErrors(['login' => 'name atau password salah.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }
}
