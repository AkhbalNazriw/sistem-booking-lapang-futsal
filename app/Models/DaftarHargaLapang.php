<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarHargaLapang extends Model
{
    use HasFactory;

    protected $table = 'daftar_harga_lapang';

    protected $fillable = [
        'jenislapangan',
        'harga',
        'foto',
    ];
}
