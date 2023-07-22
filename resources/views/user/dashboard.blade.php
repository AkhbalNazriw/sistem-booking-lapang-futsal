<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/user-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user-sidemenu.css') }}">
    
    <script>
        function openPopupWindow(url) {
            window.open(url, '_blank', 'width=600,height=400');
        }

        function filterData() {
            var selectedDate = document.getElementById('tanggal-filter').value;
            var rows = document.querySelectorAll('.jadwal-table tbody tr');

            rows.forEach(function(row) {
                var date = row.querySelector('.tanggal-column').textContent;
                if (selectedDate === 'all' || date === selectedDate) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
    <title>Dashboard Player</title>
</head>
<body>
<aside>
    <div class="container">
        <div class="sidebar">
            <div class="profile">
                <img src="{{ asset('storage/profilepic/profil-pic.png')}}" alt="Profile Picture" class="profile-picture">
                <center><h3 class="profile-name">TI Futsal</h3></center>
            </div>
            <ul class="menu">
                <center>
                    <div class="action-buttons">
                        <a href="/" class="button-home">Home</a>
                    </div>
                </center>

                <div class="button-container">
                    <a href="{{ route('pesansekarang') }}" class="pesan-sekarang-button">Booking</a>
                </div>

                <div class="button-container">
                    <a href="{{ route('daftarharga.index') }}" class="daftar-harga-lapang">Daftar Harga</a>
                </div>

                <div class="button-container">
                    <a onclick="openPopupWindow('{{ route('peraturan') }}')" class="popup-link">Peraturan</a>
                </div>
            </ul>
        </div>
        <div class="content">
            <h2 class="table-title">Jadwal Main</h2>
            <div class="filter-container">
                <label for="tanggal-filter">Filter berdasarkan tanggal:</label>
                <select id="tanggal-filter" onchange="filterData()">
                    <option value="all">Semua Tanggal</option>
                    <!-- Tambahkan opsi untuk setiap tanggal yang ada -->
                    @foreach ($jadwalmain as $jadwal)
                        <option value="{{ $jadwal->tanggal }}">{{ $jadwal->tanggal }}</option>
                    @endforeach
                </select>
            </div>
            <table class="jadwal-table">
            <thead class="sticky-header">
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Tim</th>
                        <th>Alamat</th>
                        <th>WA</th>
                        <th>Lapangan</th>
                        <th class="tanggal-column">Tanggal</th>
                        <th>Jam</th>
                        <th>Bukti TF</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwalmain as $jadwal)
                        <tr>
                            <td>{{ $jadwal->id }}</td>
                            <td>{{ $jadwal->nama }}</td>
                            <td>{{ $jadwal->nama_tim }}</td>
                            <td>{{ $jadwal->alamat }}</td>
                            <td>{{ substr($jadwal->no_hp, 0, -4) . '****' }}</td>
                            <td>{{ $jadwal->pilih_lapangan }}</td>
                            <td class="tanggal-column">{{ $jadwal->tanggal }}</td>
                            <td>{{ $jadwal->jam }}</td>
                            <td>
                                @if ($jadwal->bukti_bayar)
                                    <img class="bukti-bayar-img" src="{{ asset('storage/' . $jadwal->bukti_bayar) }}" alt="Bukti Bayar">
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</aside>

<footer>
    <p>Hubungi Admin: 0881-888-888, Untuk pembatalan atau konfirmasi lebih lanjut</p>
    <p>BCA : 47047401 a/n Saya, DANA : 0881888888 a/n TIFUTSAL</p>
</footer>
</body>
</html>
