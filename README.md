# 📘 Sistem Informasi Praktek Kerja Lapangan (PKL)

Sistem Informasi Praktek Kerja Lapangan (PKL) adalah aplikasi berbasis web yang dikembangkan menggunakan framework Laravel untuk mendukung proses pengelolaan kegiatan PKL di lingkungan sekolah secara terstruktur, efektif, dan terintegrasi.

Project ini dibuat sebagai bagian dari **Kerja Praktek (KP)** pada program studi Teknik Informatika.

## 🚀 Deskripsi Sistem

Sistem ini dirancang untuk menggantikan proses manual dalam pengelolaan PKL seperti:
- Pengajuan tempat PKL
- Monitoring kegiatan siswa
- Absensi harian
- Penilaian laporan

Dengan sistem ini, seluruh proses dilakukan secara digital dan dapat diakses oleh beberapa aktor dengan hak akses masing-masing.

### 👥 Aktor Sistem
- Ketua Jurusan
- Guru Pembimbing
- Siswa

## 🧑‍💻 Teknologi yang Digunakan

### Backend
- Laravel (PHP Framework)

### Frontend
- HTML, CSS, JavaScript
- Bootstrap
- Tailwind CSS

### Library & Plugin
- Font Awesome
- DataTables
- Chart.js

### Database
- MySQL

## ✨ Fitur Utama

### 🔐 Multi User System

Sistem memiliki 3 role utama:
- Ketua Jurusan
- Guru Pembimbing
- Siswa

## Spatie Laravel Permission

Digunakan untuk mengatur role dan permission (Ketua Jurusan, Guru, Siswa).

Install :
```
composer require spatie/laravel-permission
```
Publish config :
```
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```
Migrasi :
```
php artisan migrate
```

### 🗂️ Fitur Ketua Jurusan
- Mengelola data guru pembimbing
- Mengelola data siswa
- Mengelola data instansi PKL
- Menentukan guru pembimbing pada instansi
- Melakukan pemetaan siswa ke instansi

### 👨‍🏫 Fitur Guru Pembimbing
- Melihat siswa bimbingan
- Monitoring jurnal kegiatan siswa
- Melihat lokasi absensi siswa (map)
- Rekap absensi siswa
- Cetak laporan absensi
- Memberikan penilaian laporan
- Memberikan revisi laporan jika diperlukan

### 🎓 Fitur Siswa
- Mengajukan PKL
- Melakukan absensi berbasis geolokasi
- Mengisi jurnal kegiatan
- Mengumpulkan laporan PKL
- Melihat status penilaian dan revisi

## 📍 Sistem Absensi Geolokasi

### Absensi dilakukan menggunakan:

- Latitude
- Longitude

### Ketentuan Status Kehadiran:
- Hadir → Jika absen tepat waktu
- Telat → Jika melewati jam masuk
- Tidak Hadir → Jika melewati batas toleransi

## DomPDF (Generate PDF)

Digunakan untuk fitur cetak laporan absensi.

Install :
```
composer require barryvdh/laravel-dompdf
```
Publish config :
```
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
```

## 🧭 Alur Sistem (Singkat)
1. Ketua jurusan mengelola data master (siswa, guru, instansi)
2. Siswa mengajukan PKL
3. Ketua jurusan menentukan instansi & pembimbing
4. Siswa melakukan absensi & mengisi jurnal
5. Guru memonitor aktivitas siswa
6. Siswa mengumpulkan laporan
7. Guru memberikan penilaian & revisi

## 📌 Catatan
- Pastikan GPS aktif saat melakukan absensi
- Waktu absensi mengikuti pengaturan sistem
- Relasi siswa dan guru berdasarkan instansi

## 👨‍💻 Developer

Dikembangkan oleh: <br/>
**Rafly Idan** <br/>
**Mahasiswa Teknik Informatika** <br/>
**Universitas Suryakancana** <br/>

## 📄 Lisensi

Project ini dibuat untuk keperluan akademik (Kerja Praktek) dan pengembangan sistem informasi di lingkungan sekolah.
