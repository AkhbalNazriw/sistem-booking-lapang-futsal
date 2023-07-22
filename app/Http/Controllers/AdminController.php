<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\JadwalMain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hashedPasswordFromDatabase = 'hashed_password_from_database';
        $password = bcrypt($request->input('password'));
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:20',
            'nama_tim' => 'required|max:20',
            'alamat' => 'required|max:100',
            'no_hp' => 'required|max:13',
            'pilih_lapangan' => 'required|in:Rumput,Vynil',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'bukti_bayar' => 'required|mimes:jpeg,png|max:2048', // Contoh validasi untuk file gambar (jpeg/png) dengan ukuran maksimum 2MB
        ]);
        
        
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Upload bukti_bayar
        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $path = $file->store('bukti_bayar', 'public');
        } else {
            $path = null;
        }

        // Simpan data jadwalmain
        $jadwalmain = new JadwalMain;
        $jadwalmain->nama = $request->nama;
        $jadwalmain->nama_tim = $request->nama_tim;
        $jadwalmain->alamat = $request->alamat;
        $jadwalmain->no_hp = $request->no_hp;
        $jadwalmain->pilih_lapangan = $request->pilih_lapangan;
        $jadwalmain->tanggal = $request->tanggal;
        $jadwalmain->jam = $request->jam;
        $jadwalmain->bukti_bayar = $path;
        $jadwalmain->save();

        
    
        // Logika penyimpanan data jika validasi berhasil
        // ...
    
        return redirect('/admin/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
            $jadwalmain = JadwalMain::find($id);
            return view('admin.edit', compact('jadwalmain'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
        $jadwalmain = JadwalMain::find($id);
    $jadwalmain->update($request->all());
    return redirect('/admin/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     
     public function destroy($id)
        {
         $jadwalmain = JadwalMain::findOrFail($id);
         
         // Hapus file bukti_bayar jika ada
         if ($jadwalmain->bukti_bayar) {
             Storage::disk('public')->delete($jadwalmain->bukti_bayar);
         }
     
         $jadwalmain->delete();
     
         return redirect('/admin/dashboard')->with('success', 'Data berhasil dihapus');

        }

        public function login(Request $request)
        {
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);
        
            $credentials = $request->only('username', 'password');
        
            // Lakukan validasi credentials
            if (!Auth::guard('admin')->attempt($credentials)) {
                return redirect()->back()->withErrors(['username' => 'Username salah. Silakan coba lagi.']);
            }
        
            // Jika credentials valid, alihkan ke halaman dashboard admin
            return redirect()->route('dashboard');

     
            }

            public function lupaPassword()
                {
                    return view('admin.lupa-password');
                }

            public function resetPassword(Request $request)
{
    $username = $request->input('username');

    // Periksa apakah pengguna dengan username yang diberikan ada dalam database
    $admin = Admin::where('username', $username)->first();

    if (!$admin) {
        return redirect()->back()->with('error', 'Username tidak valid.');
    }

    // Ubah password pengguna menjadi nilai default
    $admin->password = bcrypt('admin123');
    $admin->save();

    return redirect('/admin')->with('success', 'Password berhasil diatur ulang.');
}




}