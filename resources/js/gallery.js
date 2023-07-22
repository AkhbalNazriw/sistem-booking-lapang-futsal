// Ambil elemen galeri
const gallery = document.querySelector('.gallery');

// Ambil semua gambar dalam galeri
const images = gallery.querySelectorAll('img');

// Tambahkan event listener untuk setiap gambar
images.forEach(image => {
  image.addEventListener('click', () => {
    // Lakukan aksi yang diinginkan saat gambar diklik
    console.log(`Anda mengklik gambar dengan alt: ${image.alt}`);
  });
});
