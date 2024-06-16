<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Surat;
use App\Models\KategoriSurat;
use Illuminate\Http\Request;;

class SuratController extends Controller
{

public function index()
    {
        $surats = Surat::with(['user', 'kategoriSurat'])->get();
        return view('admintableview.index', compact('surats'));
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
}

