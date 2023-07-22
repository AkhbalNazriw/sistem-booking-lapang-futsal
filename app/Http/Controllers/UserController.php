<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalMain;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function dashboard()
    {
        $jadwalmain = JadwalMain::all();
        return view('user.dashboard', compact('jadwalmain'));
    }

    public function pesanSekarang()
    {
    return view('user.pesan-sekarang');
    }

    public function simpanpesan(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama' => 'required',
            'nama_tim' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'pilih_lapangan' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'bukti_bayar' => 'required|image',
        ]);

        $existingJadwal = JadwalMain::where('pilih_lapangan', $request->pilih_lapangan)
        ->where('tanggal', $request->tanggal)
        ->where('jam', $request->jam)
        ->first();

    if ($existingJadwal) {
        Session::flash('error', 'Waktu/Jam sudah dibooking, silahkan cari jam/lapang yang lain!');
        return redirect()->back();
    }
    



        // Simpan data pesanan ke dalam tabel jadwalmain
        $jadwalMain = new JadwalMain;
        $jadwalMain->nama = $request->nama;
        $jadwalMain->nama_tim = $request->nama_tim;
        $jadwalMain->alamat = $request->alamat;
        $jadwalMain->no_hp = $request->no_hp;
        $jadwalMain->pilih_lapangan = $request->pilih_lapangan;
        $jadwalMain->tanggal = $request->tanggal;
        $jadwalMain->jam = $request->jam;

        // Simpan gambar bukti bayar
        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $path = $file->store('bukti_bayar', 'public');
            $jadwalMain->bukti_bayar = $path;
        }

        $jadwalMain->save();

        // Redirect ke halaman dashboard user atau halaman lain yang diinginkan
        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil disimpan.');
    }


}
