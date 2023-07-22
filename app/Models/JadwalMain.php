<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMain extends Model
{
    use HasFactory;

    protected $table = 'jadwalmain';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'nama_tim', 'alamat', 'no_hp', 'pilih_lapangan', 'tanggal', 'jam', 'bukti_bayar'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($jadwalmain) {
            if (!empty($jadwalmain->bukti_bayar)) {
                // Hapus bukti bayar dari penyimpanan file (misalnya: storage)
                // contoh: Storage::disk('public')->delete($jadwalmain->bukti_bayar);
            }
        });
    }
}
