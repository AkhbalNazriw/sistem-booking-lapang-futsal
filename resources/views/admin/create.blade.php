<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="{{ asset('css/form_add.css') }}">
    <title>Tambah Data Jadwal Main</title>
</head>
<body>
    <h1>Tambah Data Jadwal Main</h1>

    @if ($errors->any())
   <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}">
        </div>
        <div>
            <label for="nama_tim">Nama Tim:</label>
            <input type="text" name="nama_tim" id="nama_tim" value="{{ old('nama_tim') }}">
        </div>
        <div>
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}">
        </div>
        <div>
            <label for="no_hp">No. HP:</label>
            <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}">
        </div>
        <div>
            <label for="pilih_lapangan">Pilih Lapangan:</label>
            <select name="pilih_lapangan" id="pilih_lapangan">
                <option value="Rumput" {{ old('pilih_lapangan') == 'Rumput' ? 'selected' : '' }}>Rumput</option>
                <option value="Vynil" {{ old('pilih_lapangan') == 'Vynil' ? 'selected' : '' }}>Vynil</option>
            </select>
        </div>
        <div>
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') }}">
        </div>
        <div>
            <label for="jam">Jam:</label>
            <input type="time" name="jam" id="jam" value="{{ old('jam') }}">
        </div>
        <div>
            <label for="bukti_bayar">Bukti Bayar:</label>
            <input type="file" name="bukti_bayar" id="bukti_bayar">
            <form action="/upload" method="POST" enctype="multipart/form-data">
        </div>
    

<br>
<div>
            <button type="submit">Simpan</button>  
         
</div>          
    </form>
</body>
</html>
