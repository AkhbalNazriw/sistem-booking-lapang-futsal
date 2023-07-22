<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/edit-form.css') }}">
    <title>Edit Jadwal Main</title>
</head>
<body>
    <h1>Edit Jadwal Main</h1>
    <form action="{{ route('admin.update', $jadwalmain->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="{{ $jadwalmain->nama }}" required><br>

        <label for="nama_tim">Nama Tim:</label>
        <input type="text" id="nama_tim" name="nama_tim" value="{{ $jadwalmain->nama_tim }}" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="{{ $jadwalmain->alamat }}" required><br>

        <label for="no_hp">Nomor HP:</label>
        <input type="text" id="no_hp" name="no_hp" value="{{ $jadwalmain->no_hp }}" required><br>

        <label for="pilih_lapangan">Pilih Lapangan:</label>
        <select id="pilih_lapangan" name="pilih_lapangan" required>
            <option value="Rumput" {{ $jadwalmain->pilih_lapangan == 'Rumput' ? 'selected' : '' }}>Rumput</option>
            <option value="Vynil" {{ $jadwalmain->pilih_lapangan == 'Vynil' ? 'selected' : '' }}>Vynil</option>
        </select><br>

        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" value="{{ $jadwalmain->tanggal }}" required><br>

        <label for="jam">Jam:</label>
        <input type="time" id="jam" name="jam" value="{{ $jadwalmain->jam }}" required><br>

        

        <!-- Tambahkan elemen input untuk kolom lainnya sesuai kebutuhan -->

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
