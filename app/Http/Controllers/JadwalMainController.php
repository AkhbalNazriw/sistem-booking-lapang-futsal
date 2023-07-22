<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalMain;

class JadwalMainController extends Controller
{
    public function create()
    {
        return view('jadwalmain.create');
    }

    public function store(Request $request)
    {
        // Validasi data dari $request
        $validatedData = $request->validate([
            'nama' => 'required|max:30',
            'nama_tim' => 'required|max:20',
            'alamat' => 'required|max:100',
            'no_hp' => 'required|max:13',
            'pilih_lapangan' => 'required|in:Rumput,Vynil',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'bukti_bayar' => 'nullable|image|max:2048', // Jika ingin membatasi jenis file yang diunggah
        ]);

        // Simpan data jadwalmain baru ke database
        JadwalMain::create($validatedData);

        // Redirect ke halaman dashboard User atau halaman lain yang sesuai
        return redirect()->route('user.dashboard')->with('success', 'JadwalMain berhasil ditambahkan!');
    }
}
