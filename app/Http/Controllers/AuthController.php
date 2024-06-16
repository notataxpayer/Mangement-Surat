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
    public function showLoginForm()
    {
        return view('login.login');
    }

    // public function login(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'name' => 'required|string',
    //         'password' => 'required|string',
    //     ]);
    //     $credentials = $request->only('name', 'password');
    //     $hashedPassword = Hash::make($request->password);

    //     if (Auth::attempt($credentials)) {
    //         // Jika login sukses
    //         Session::put('name', $request->name);
    //         return redirect()->intended('/dashboard');
    //     } else {
    //         // Jika login gagal
    //         return redirect()->back()->withErrors(['login' => 'name atau password salah.']);
    //     }
    // }

    public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('name', 'password');

    if (Auth::attempt($credentials)) {
        // Memeriksa level pengguna setelah login berhasil
        $user = Auth::user(); // Mendapatkan informasi pengguna yang sedang login
        if ($user->level == 1) {
            // Jika pengguna memiliki level admin (misalnya level_id = 1)
            Session::put('name', $request->name);
            return redirect()->intended('/dashboard/suratadmin');
        } 
        elseif ($user->level == 2) {
            // Jika pengguna memiliki level admin (misalnya level_id = 1)
            Session::put('name', $request->name);
            return redirect()->intended('/dashboard');}
        else {
            // Jika bukan admin, logout dan redirect ke halaman login dengan pesan error
            Auth::logout();
            return redirect('/login')->withErrors(['login' => 'Anda tidak memiliki akses sebagai admin.']);
        }
    } else {
        // Jika login gagal
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
