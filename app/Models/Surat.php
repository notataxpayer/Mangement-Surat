<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $primaryKey = 'idSurat';

    protected $fillable = [
        'nomorsurat', 'pengirim', 'penerima', 'perihal', 'idUser', 'idKategori','created_at', 'status', 'arsip'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function kategoriSurat()
    {
        return $this->belongsTo(kategoriSurat::class, 'idKategori', 'idKategori');
    }

    
}
