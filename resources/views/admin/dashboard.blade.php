<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="{{ asset('css/admin-table.css') }}">
    <title>Dashboard Admin</title>
</head>
<body>

<center> <h1>Kelola Data Pelanggan</h1></center>
<div class="search-container">
        <input type="text" id="search" placeholder="Cari Nama Atau ID">
        <button type="button" onclick="searchData()">Cari</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Nama Tim</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Pilih Lapangan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>bukti_bayar</th>
                <th>Aksi</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwalmain as $jadwal)
            <tr>
                <td>{{ $jadwal->id }}</td>
                <td>{{ $jadwal->nama }}</td>
                <td>{{ $jadwal->nama_tim }}</td>
                <td>{{ $jadwal->alamat }}</td>
                <td>{{ $jadwal->no_hp }}</td>
                <td>{{ $jadwal->pilih_lapangan }}</td>
                <td>{{ $jadwal->tanggal }}</td>
                <td>{{ $jadwal->jam }}</td>
                <td>
                @if ($jadwal->bukti_bayar)
                    <a href="{{ asset('storage/' . $jadwal->bukti_bayar) }}" target="_blank">
                        <img src="{{ asset('storage/' . $jadwal->bukti_bayar) }}" alt="Bukti Bayar" width="200">
                    </a>
                @else
                    N/A
                @endif
                </td>
                <td>
                <a href="{{ route('admin.edit', $jadwal->id) }}"> 
                    <img src="{{ asset('/storage/icon/edit.png') }}" alt="Edit" class="icon">
                        </a>
                    <a href="{{ route('admin.delete', $jadwal->id) }}" onclick="event.preventDefault(); confirmDelete('{{ $jadwal->id }}')">
                    <img src="{{ asset('storage/icon/hapus.png') }}" alt="Hapus" class="icon">
                        </a>


                <script>
                function confirmDelete(id) {
                     if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                     // Jika pengguna mengonfirmasi, kirimkan permintaan penghapusan ke server
                     window.location.href = '/admin/delete/' + id;}}
                </script>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <center><p id="no-data-message" style="display: none;">Data Tidak Ditemukan !!</p></center>

    <!-- Tambahkan JavaScript untuk fungsi pencarian -->
    <script>
        function searchData() {
    // Ambil nilai pencarian dari input
    var searchValue = document.getElementById('search').value.toLowerCase();

    // Ambil semua baris data pada tabel
    var rows = document.querySelectorAll('tbody tr');

    // Inisialisasi variabel untuk menghitung jumlah data yang ditemukan
    var foundData = 0;

    // Loop melalui setiap baris data
    rows.forEach(function(row) {
        // Ambil data pada kolom ID dan nama pada baris saat ini
        var id = row.querySelector('td:nth-child(1)').innerText.toLowerCase();
        var nama = row.querySelector('td:nth-child(2)').innerText.toLowerCase();

        // Periksa apakah nilai pencarian cocok dengan data ID atau nama
        if (id.includes(searchValue) || nama.includes(searchValue)) {
            // Tampilkan baris jika cocok
            row.style.display = 'table-row';
            foundData++;
        } else {
            // Sembunyikan baris jika tidak cocok
            row.style.display = 'none';
        }
    });

         // Tampilkan pesan "Data Tidak Ditemukan" jika tidak ada data yang ditemukan
        var noDataMessage = document.getElementById('no-data-message');
        if (foundData === 0) {
            noDataMessage.style.display = 'block';
        } else {
            noDataMessage.style.display = 'none';
        }
    }
        
    </script>
    
                    <br>

    <a href="{{ route('admin.create') }}" class = "button-add" >Tambah</a> 
    
    <br>
    

    <a href="{{ route('admin.logout') }}"  class="button-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
    <form id="logout-form" action="{{ route('admin.logout') }}" class="button-logout" method="POST" style="display: none;">
        @csrf
    </form>
</div>
</body>
</html>
