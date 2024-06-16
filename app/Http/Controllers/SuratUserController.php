<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Surat;
// use App\Models\;
use App\Models\KategoriSurat;
use Illuminate\Http\Request;;
use Illuminate\Support\Facades\Auth;;

class SuratUserController extends Controller
{

public function index()
{
    $currentUserId = Auth::id();
    $surats = Surat::where('idUser', $currentUserId)->get();
    
    return view('suratuser.suratuser', compact('surats'));
}
    
public function getUserName(Request $request)
    {
        $id = $request->query('id');
        $user = User::find($id);
        
        return response()->json(['name' => $user->name]);
    }

    public function getCategoryName(Request $request)
    {
        $id = $request->query('id');
        $kategori = KategoriSurat::find($id);
        
        return response()->json(['name' => $kategori->namaKategori]);
    }

    public function getAllUser()
    {
        $users = User::all()->pluck('name', 'id')->toArray();
        return response()->json($users);
    }
    public function getAllKategori()
    {
        $Kategori = KategoriSurat::all()->pluck('namaKategori', 'idKategori')->toArray();
        return response()->json($Kategori);
    }

    
    public function create()
    {
        // Tampilkan form pengajuan surat
        return view('request.create');
    }
    public function store(Request $request)
    {
        // Validasi data form
        $validatedData = $request->validate([
            'pengirim' => 'required|string|max:255',
            'penerima' => 'required|string|max:255',
            'nomorsurat' => 'required|string|max:255',
            'idKategori' => 'required|string',
            'perihal' => 'required|string|max:255',
        ]);

        // Mendapatkan idUser dari user yang sedang login
        $idUser = Auth::id(); // Mendapatkan id dari user yang sedang login

        // Tambahkan idUser ke dalam validatedData
        $validatedData['idUser'] = $idUser;

        // Simpan data ke database
        Surat::create($validatedData);

        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Surat berhasil diajukan.');
    }
}

