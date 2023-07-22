<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('css/form_pesan.css') }}">

    <title>Pesan Sekarang</title>
</head>
<body>
    <center><h1>Booking Sekarang</h1></center>
    <p>Silahkan Isi Data Tim Anda.</p>

    <!-- Isi dengan konten halaman pesan sekarang -->
        <form method="POST" action="{{ route('simpanpesan') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" required placeholder="Masukkan Nama">
            </div>
            <div class="form-group">
                <label for="nama_tim">Nama Tim:</label>
                <input type="text" name="nama_tim" id="nama_tim" class="form-control" required placeholder="Masukkan Nama Timmu">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" id="alamat" class="form-control" required placeholder="Masukkan Nama Desa Saja !">
            </div>
            <div class="form-group">
                <label for="no_hp">No HP:</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control" required placeholder="No HP Yang Bisa Dihubungi">
            </div>
            <div class="form-group">
                <label for="pilih_lapangan">Pilih Lapangan:</label>
                <select name="pilih_lapangan" id="pilih_lapangan" class="form-control" required>
                    <option value="Rumput">Rumput</option>
                    <option value="Vynil">Vynil</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jam">Jam:</label>
                <input type="time" name="jam" id="jam" class="form-control" step=3600 required onblur="validateTime()">
                <p id="error-message" style="display: none;" class="error-message">Mohon, Masukkan jam saja dengan menit 00</p>
            </div>
            <div class="form-group">
                <label for="bukti_bayar">Bukti Bayar:</label>
                <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control-file" accept="image/*">
                <form action="/upload" method="POST" enctype="multipart/form-data">
            </div>
            <div class="parent">
            <button type="submit" class="btn btn-primary">Booking</button>
            <div>
            <div>
            <div>
</br>
            <div class="parent">
            <a href="{{ route('user.dashboard') }}"  class="backtodash">Batal</a>
            </div>
        </form>
        @if(Session::has('error'))
        <script>
        alert('{{ Session::get('error') }}');
        </script>
        @endif

        <script>
            function validateTime() {
            var inputTime = document.getElementById('jam').value;
            var parts = inputTime.split(':');
    
            if (parts.length !== 2 || parseInt(parts[1]) !== 0) {
            var errorMessage = document.getElementById('error-message');
            errorMessage.style.display = 'block';
        
            setTimeout(function() {
            errorMessage.style.display = 'none';
        }, 3000); // Setelah 3 detik, sembunyikan pemberitahuan
    }
}
</script>
</body>
</html>
