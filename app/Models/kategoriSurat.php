<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoriSurat extends Model
{
    use HasFactory;

    protected $primaryKey = 'idKategori';

    protected $fillable = [
        'namaKategori'
    ];
}
