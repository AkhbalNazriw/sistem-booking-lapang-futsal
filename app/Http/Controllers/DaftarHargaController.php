<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarHargaLapang;

class DaftarHargaController extends Controller
{
    public function index()
    {
        $daftarHarga = DaftarHargaLapang::all();
        return view('daftarharga.index', compact('daftarHarga'));
    }
}
