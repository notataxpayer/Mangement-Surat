<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaPengaju',
        'noSurat',
        'kategori',
        'perihal',
        'penerima',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'idUser');
    }

    public function kategoriSurat()
    {
        return $this->belongsTo(KategoriSurat::class, 'idKategori', 'idKategori');
    }
}
