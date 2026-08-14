# 👶 Website Company Profile & Admin CMS - Taman Penitipan Anak (TPA) Robbani

[![Laravel 13](https://img.shields.io/badge/Laravel-13.25.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP 8.4](https://img.shields.io/badge/PHP-8.4.24-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Tailwind CSS v4](https://img.shields.io/badge/Tailwind_CSS-v4.0-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Alpine.js](https://img.shields.io/badge/Alpine.js-v3-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=white)](https://alpinejs.dev)
[![License](https://img.shields.io/badge/License-MIT-blue.style=for-the-badge)](LICENSE)

Website Company Profile interaktif dan modern untuk **Taman Penitipan Anak (TPA) Robbani** yang berlokasi di Indralaya Utara, Kabupaten Ogan Ilir, Sumatera Selatan. Dilengkapi dengan **Content Management System (CMS) Dashboard Admin** serbaguna untuk mengelola seluruh teks, informasi pendaftaran, kegiatan harian, fasilitas, dan foto secara real-time.

🌐 **Website Utama**: [https://tpa.sitrobbani.sch.id](https://tpa.sitrobbani.sch.id)  
🔑 **Admin Login**: [https://tpa.sitrobbani.sch.id/admin/login](https://tpa.sitrobbani.sch.id/admin/login)

---

## ✨ Fitur-Fitur Utama

### 🏡 Halaman Depan (Public Website)
- **Hero & Announcement Bar**: Banner promo kuota pendaftaran terbatas, judul dynamic, dan jam operasional.
- **Profil & Pilar TPA Robbani**: Informasi pengasuhan berbasis kasih sayang, edukasi karakter, huruf dasar & Hijaiyah.
- **Fasilitas Utama Showcase**: Ruang ber-AC, APE edukatif, kamar tidur, ruang makan, dapur higienis, dan toilet dengan water heater/cooler.
- **Kegiatan Harian Interaktif**: 6 jadwal aktivitas harian ananda dari pagi hingga sore.
- **Informasi 2 Cabang**:
  - **TPA Pusat**: Jl. Sarjana, Blok C17 Timbangan, Indralaya Utara (`0811-7474-72`).
  - **TPA Cabang**: Jl. Perumahan Griya Sejahtera 7 A4 No. 5 (`0823-7817-6209`).
- **Formulir Pendaftaran Online (Fast-Track)**: Registrasi online langsung terhubung ke WhatsApp pengasuh secara otomatis dengan pesan terformat.
- **Tanya Jawab (FAQ)** & Widget WhatsApp Melayang.

### 🛡️ Dashboard Admin CMS (`/admin`)
- **Pengaturan Teks & Foto Website (`/admin/settings`)**: Mengubah judul, subtitle, pengumuman, daftar syarat, uang pendaftaran, nomor WA, serta mengunggah **Foto Hero**, **Foto Pembelajaran**, dan **Logo PNG**.
- **Kelola Fasilitas (`/admin/facilities`)**: Tambah/Edit/Hapus fasilitas utama beserta upload **Foto Ruangan**.
- **Kelola Kegiatan Harian (`/admin/activities`)**: Tambah/Edit/Hapus program kegiatan harian, gradien warna, dan upload **Foto Kegiatan**.
- **Kelola Pendaftaran Online (`/admin/registrations`)**: Melihat daftar pendaftar masuk, mengubah status (*Menunggu Konfirmasi*, *Dikonfirmasi*, *Ditolak*), dan langsung WhatsApp ke orang tua.

---

## 🛠️ Spesifikasi Teknologi (Tech Stack)

- **Backend Framework**: Laravel 13.25.0 (PHP 8.4.24)
- **Frontend Styling**: Tailwind CSS v4 & Alpine.js
- **Database**: SQLite (Lokal) / MySQL (Production / cPanel)
- **Bundler & Build Tool**: Vite 8.2
- **Iconography & Fonts**: Instrument Sans & Google Inter Fonts

---

## 🚀 Cara Menjalankan Project secara Lokal

1. **Clone Repository**:
   ```bash
   git clone https://github.com/septaryanhidayat/tparobbani.git
   cd tparobbani
   ```

2. **Install Depedensi PHP & JavaScript**:
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment (`.env`)**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Migrasi Database & Seeder**:
   ```bash
   touch database/database.sqlite
   php artisan migrate --seed
   ```

5. **Jalankan Server Development**:
   ```bash
   npm run dev
   php artisan serve
   ```

Buka `http://127.0.0.1:8000` di browser Anda.

---

## 🔑 Kredensial Login Admin (Lokal & Production)

- **URL Login Admin**: `/admin/login`
- **Email**: `tpa@sitrobbani.sch.id`
- **Password**: `p4l3mb4ng`

---

## 📦 Deployment ke cPanel / Shared Hosting

1. Upload berkas project ke server hosting Anda.
2. Salin isi file `.env.production` menjadi `.env`.
3. Import file `database/tpa_robbani.sql` ke database MySQL cPanel phpMyAdmin.
4. Jalankan kompilasi aset & symlink storage:
   ```bash
   php artisan storage:link
   php artisan config:clear
   ```

---

## 📄 Lisensi

Project ini dikembangkan untuk **SIT Robbani / TPA Robbani Indralaya**. Seluruh hak cipta dilindungi.
