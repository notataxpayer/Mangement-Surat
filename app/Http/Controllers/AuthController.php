<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
{
    // Ambil nama pengguna yang sedang login
    $namaPengguna = Auth::user()->name; // Ganti 'name' dengan kolom yang sesuai dari model User

    // Kirimkan data nama pengguna ke view
    return view('suratuser.suratuser', ['namaPengguna' => $namaPengguna]);
}
    public function indexform()
{
    // Ambil nama pengguna yang sedang login
    $idUser = Auth::user()->idUser; // Ganti 'name' dengan kolom yang sesuai dari model User

    // Kirimkan data nama pengguna ke view
    return view('ajukan.ajukan', ['idUser' => $idUser]);
}
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

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        if ($user->level == 1) {
            //admin
            Session::put('name', $request->name);
            return redirect()->intended('/dashboard/admin');
        } 
        elseif ($user->level == 2) {
            //user
            Session::put('name', $request->name);
            return redirect()->intended('/dashboard');}
        else {
            // False
            Auth::logout();
            return redirect('/login')->withErrors(['login' => 'Anda tidak memiliki akses sebagai admin.']);
        }
    } else {
        // Failed
        return redirect()->back()->withErrors(['login' => 'Nama atau password salah.']);
    }
}


    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }
}
