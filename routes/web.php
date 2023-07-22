<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\DaftarHargaController;

//halaman home
Route::get('/', function () {
    return view('welcome');
});

//halaman admin
Route::get('/admin', function () {
    return view('admin');
});

//halaman login admin

Route::post('/admin/login', function (Illuminate\Http\Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');

    //$admin = Admin::where('username', $username)->first();
    $admin = DB::table('admin')->where('username', $username)->first();

    //if ($admin && Hash::check($password, $admin->password)) {
    if ($admin && Hash::check($password, $admin->password)) {
    // Jika login berhasil, redirect ke halaman admin
    return redirect('/admin/dashboard');
   
    } else {
        // Jika login gagal, redirect kembali ke halaman login dengan pesan error
        return redirect('/admin')->with('error', 'Terjadi Kesalahan Username/Password');
    }
});

//halaman dashboard admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

//halaman dashboard admin dengan tabel
Route::get('/admin/dashboard', function () {
    $jadwalmain = App\Models\JadwalMain::all(); // Mengambil semua data dari tabel jadwalmain
    return view('admin.dashboard', ['jadwalmain' => $jadwalmain]);
});

//form edit data admin
Route::put('/admin/update/{id}', function (Illuminate\Http\Request $request, $id) {
    $data = $request->validate([
        'nama' => 'required|max:20',
        'nama_tim' => 'required|max:20',
        'alamat' => 'required|max:100',
        'no_hp' => 'required|max:13',
        'pilih_lapangan' => 'required|in:Rumput,Vynil',
        'tanggal' => 'required|date',
        'jam' => 'required|date_format:H:i',
        // Tambahkan validasi untuk kolom lainnya sesuai kebutuhan
    ]);

    $jadwalmain = App\Models\JadwalMain::find($id);
    $jadwalmain->update($data);

    return redirect('/admin/dashboard');
})->name('admin.update');


//rute edit admin
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');

//ruta tambah data admin
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');

//rute hapus data admin
Route::get('/admin/delete/{id}', function ($id) {
    $jadwalmain = App\Models\JadwalMain::find($id); // Mengambil data jadwalmain berdasarkan ID yang diterima

    if (!$jadwalmain) {
        return redirect('/admin/dashboard')->with('error', 'Data tidak ditemukan');
    }

    $jadwalmain->delete(); // Menghapus data jadwalmain

    return redirect('/admin/dashboard')->with('success', 'Data berhasil dihapus');
})->name('admin.delete');

//logout admin
Route::post('/admin/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('admin.logout');



//.............Bagian User................
//Dashboard User
Route::get('/user', function () {
    return view('user.dashboard');
})->name('user.dashboard');

Route::get('/user', 'App\Http\Controllers\UserController@dashboard')->name('user.dashboard');
Route::resource('jadwalmain', JadwalMainController::class);


Route::get('/pesan-sekarang', 'UserController@pesanSekarang')->name('pesansekarang');




Route::get('/pesan-sekarang', [UserController::class, 'pesanSekarang'])->name('pesansekarang');

Route::post('/simpanpesan', [UserController::class, 'simpanpesan'])->name('simpanpesan');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

Route::get('/daftarharga', [DaftarHargaController::class, 'index'])->name('daftarharga.index');

Route::get('/lupa-password', [AdminController::class, 'lupaPassword'])->name('admin.lupa-password');
Route::post('/reset-password', [AdminController::class, 'resetPassword'])->name('admin.reset-password');


// routes/web.php

Route::get('/peraturan', function () {
    return view('user.peraturan');
})->name('peraturan');




//

