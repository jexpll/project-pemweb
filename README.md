# KARSA

### KARSA by [Wijayaka](https://wijayaka.my.id)

> **Cari peluang. Mulai bergerak.**  
> Platform digital terpadu untuk menemukan peluang kerja dan program magang terkurasi, dirancang untuk memudahkan talenta muda dan profesional dalam merintis serta mengembangkan arah karier.

---

## Tim Pengembang

Website ini disusun dan dikembangkan sebagai bagian dari pemenuhan tugas praktikum oleh **Kelompok 1** :

- **Darma Winata Suganda**
- **Arya Azizan**
- **Baratha Wijaya Kusuma .A**

---

## Tentang KARSA

KARSA hadir sebagai ruang terpusat bagi para pencari kerja, mahasiswa, dan *fresh graduate* yang sering menghadapi kesulitan dalam menyaring informasi lowongan yang tersebar dan tidak terorganisir. 

Melalui KARSA, informasi pekerjaan dan program magang disajikan secara terstruktur, mulai dari deskripsi tanggung jawab, kualifikasi yang dibutuhkan, lokasi penempatan, hingga tenggat waktu pendaftaran. Pendekatan ini memungkinkan pencari kerja mengambil keputusan karier secara lebih matang, efisien, dan terarah.

---

## Fitur Utama

### 1. Eksplorasi Peluang Cerdas
Pengguna dapat mencari lowongan pekerjaan maupun program magang melalui pencarian kata kunci dan filter multi-kategori:
- **Filter Jenis Program**: Memisahkan antara posisi kerja penuh/paruh waktu dan program magang.
- **Penyaringan Bidang Minat**: Mengelompokkan lowongan ke dalam sektor strategis, mencakup Engineering & Tech, Design & Kreatif, Marketing & Bisnis, serta Finance & Operasional.
- **Pencarian Spesifik**: Memungkinkan penelusuran instan berdasarkan judul posisi, nama perusahaan, maupun wilayah kerja.

### 2. Rekomendasi Terkurasi di Beranda
Halaman muka menyajikan rangkuman lowongan rekomendasi terbaru tanpa membebani tampilan, lengkap dengan indikator tenggat waktu dan tautan cepat menuju katalog lengkap.

### 3. Panduan Langkah Kerja Terpadu
Halaman panduan menyajikan peta jalan bagi pengguna baru, mulai dari pembuatan profil, penelusuran lowongan, tata cara melamar, hingga pemantauan hasil. Dilengkapi pula dengan bagian tanya jawab interaktif untuk menyelesaikan kendala umum pengguna.

### 4. Manajemen Akun dan Lamaran
- **Autentikasi Aman**: Registrasi profil talenta dan login dengan pengelolaan sesi yang terlindungi.
- **Dashboard Pelamar**: Ruang pribadi bagi pengguna untuk memantau status lamaran yang telah diajukan kepada perusahaan mitra.

### 5. Pengalaman Antarmuka Modern
- Antarmuka dirancang bersih dengan tipografi yang kuat, tata letak seimbang, dan konsistensi visual di seluruh halaman.
- Dilengkapi elemen interaktif halus seperti transisi transparan, efek kedalaman visual, pemuatan konten dinamis, serta navigasi responsif yang nyaman digunakan baik melalui perangkat seluler maupun peramban desktop.
- Menggunakan ikonografi berbasis vektor SVG murni untuk ketajaman visual di berbagai resolusi layar.

---

## Teknologi yang Digunakan

Platform KARSA dibangun dengan memadukan stabilitas performa sisi server dan fleksibilitas antarmuka modern yang ringan:

- **Bahasa Pemrograman Backend**: PHP 8.3 Native dengan arsitektur prosedural-modular yang terstruktur serta implementasi PDO (PHP Data Objects) untuk interaksi basis data yang aman.
- **Basis Data**: MySQL / MariaDB dengan skema relasional terstruktur yang mengelola entitas pengguna, lowongan pekerjaan, riwayat lamaran, dan penanda lowongan.
- **Pengembangan Antarmuka**:
  - HTML5 semantik untuk aksesibilitas dan struktur dokumen yang kokoh.
  - Modern CSS3 memanfaatkan CSS Grid, Flexbox, dan variabel warna untuk sistem desain yang kohesif dan adaptif di semua ukuran layar.
  - Vanilla JavaScript (ES6+) untuk menangani interaksi pengguna, animasi transisi, dan pemantauan viewport secara efisien tanpa ketergantungan pustaka eksternal.
- **Fondasi Server**: Lingkungan kontainer berbasis FrankenPHP dan web server Caddy untuk efisiensi eksekusi aplikasi berbasis PHP.

---

## Struktur Modul Sistem

- `index.php`: Halaman beranda utama yang memuat sorotan statistik, rekomendasi lowongan, navigasi bidang minat, dan ringkasan alur kerja.
- `kategori.php`: Katalog lowongan lengkap dengan sistem penyaringan bidang, jenis pekerjaan, dan bilah pencarian dinamis.
- `job.php`: Halaman detail lowongan kerja yang merinci deskripsi peran, kualifikasi, tenggat waktu, dan formulir pengiriman lamaran.
- `panduan.php`: Panduan komprehensif alur penggunaan sistem dan daftar pertanyaan yang sering diajukan (FAQ).
- `login.php` & `register.php`: Gerbang autentikasi talenta dengan desain panel ganda dan validasi data pengguna.
- `dashboard.php`: Dasbor manajemen profil dan pelacak status lamaran yang telah dikirimkan.
- `config.php`: Modul sentral untuk pembacaan variabel lingkungan, inisialisasi sesi, fungsi sanitasi, dan koneksi basis data.
- `auth.php` & `apply.php`: Pemroses logika transaksi data untuk otentikasi akun dan pengajuan berkas lamaran.
- `app.css` & `script.js`: Berkas gaya dan pengendali interaktivitas visual platform.

---

© 2026 KARSA.
