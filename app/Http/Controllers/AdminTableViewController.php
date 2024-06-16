<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTableViewController extends Controller
{
    public function index()
    {
        // Anda bisa mengambil data dari database atau melakukan proses lainnya di sini
        $surats = \App\Models\Surat::all(); // Sebagai contoh, mengambil semua data surat

        // Mengirim data ke view
        return view('admintableview.index', compact('surats'));
    }
}
