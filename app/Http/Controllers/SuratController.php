<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;

class SuratController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data form
        $validatedData = $request->validate([
            'namaPengaju' => 'required|string|max:255',
            'noSurat' => 'required|string|max:255',
            'kategori' => 'required|string',
            'perihal' => 'required|string|max:255',
            'penerima' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Surat::create($validatedData);

        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Surat berhasil diajukan.');
    }
}
