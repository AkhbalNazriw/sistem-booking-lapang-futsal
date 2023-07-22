<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/table-harga.css') }}">
    <div class="header">Daftar Harga Sewa Lapang</div>
</head>
<body>
    <table cellspacing="0">
        <thead>
            <tr>
                <th>ID Lapang</th>
                <th>Jenis Lapangan</th>
                <th>Harga/Jam</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarHarga as $harga)
            <tr>
                <td>{{ $harga->id_lapang }}</td>
                <td>{{ $harga->jenislapangan }}</td>
                <td>{{ $harga->harga }}</td>
                <td> <img src="data:image/jpeg;base64,{{ base64_encode($harga->foto) }}" alt="Gambar"></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="button-container">
    <a href="{{ route('dashboard') }}" class="btn-jadwal-main">Jadwal Main</a>
    <a href="{{ route('pesansekarang') }}" class="btn-booking">Booking</a>
</div>
</body>
</html>
