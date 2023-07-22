<!DOCTYPE html>
<html>
<head>
    <title>Daftar Jadwal Main</title>
</head>
<body>
    <div class="container">
        <h1>Daftar Jadwal Main</h1>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nama Tim</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Pilih Lapangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Bukti Bayar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwalmain as $jadwal)
                    <tr>
                        <td>{{ $jadwal->nama }}</td>
                        <td>{{ $jadwal->nama_tim }}</td>
                        <td>{{ $jadwal->alamat }}</td>
                        <td>{{ $jadwal->no_hp }}</td>
                        <td>{{ $jadwal->pilih_lapangan }}</td>
                        <td>{{ $jadwal->tanggal }}</td>
                        <td>{{ $jadwal->jam }}</td>
                        <td>{{ $jadwal->bukti_bayar }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
