<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Sekarang</title>
</head>
<body>
    <h1>Pesan Sekarang</h1>
    <form method="POST" action="{{ route('jadwalmain.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>
        </div>
        <div>
            <label for="nama_tim">Nama Tim:</label>
            <input type="text" name="nama_tim" required>
        </div>
        <div>
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" required>
        </div>
        <div>
            <label for="no_hp">No HP:</label>
            <input type="text" name="no_hp" required>
        </div>
        <div>
            <label for="pilih_lapangan">Pilih Lapangan:</label>
            <select name="pilih_lapangan" required>
                <option value="Rumput">Rumput</option>
                <option value="Vynil">Vynil</option>
            </select>
        </div>
        <div>
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" required>
        </div>
        <div>
            <label for="jam">Jam:</label>
            <input type="time" name="jam" required>
        </div>
        <div>
            <label for="bukti_bayar">Bukti Bayar:</label>
            <input type="file" name="bukti_bayar">
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
