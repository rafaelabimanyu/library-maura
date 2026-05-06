# 📚 Library Maura

**Library Maura** adalah aplikasi sistem informasi perpustakaan modern berbasis web yang dirancang untuk memberikan pengalaman terbaik (UX) bagi pengunjung dan pustakawan. Dibangun dengan ekosistem Laravel modern, aplikasi ini menawarkan antarmuka yang indah, interaktif, dan performa yang sangat cepat.

---

## 🚀 Tech Stack

Aplikasi ini dikembangkan menggunakan teknologi terkini:
- **Laravel 11**: Framework PHP modern untuk backend yang solid.
- **Tailwind CSS**: Framework CSS utility-first untuk styling yang cepat dan responsif.
- **Alpine.js**: Framework JavaScript ringan untuk interaktivitas frontend (Modal, Dropdown, Tabs).
- **Laravel Breeze**: Starter kit autentikasi minimalis namun kuat.
- **MySQL**: Sistem manajemen basis data relasional.

---

## ✨ Key Features

### 👤 User/Visitor (Public Area)
- **Pencarian Buku Real-time**: Cari buku berdasarkan judul, penulis, atau ISBN dengan cepat.
- **Filter Kategori Dinamis**: Jelajahi buku berdasarkan kategori spesifik.
- **Detail Buku Interaktif**: Tampilan detail buku menggunakan Modal Alpine.js yang elegan tanpa memuat ulang halaman.
- **Sistem Peminjaman**: Pengunjung dapat mengajukan peminjaman buku dengan mudah.

### 🛡️ Admin/Librarian (Secure Area)
- **Dashboard Premium**: Antarmuka admin eksklusif dengan tema Slate & Indigo yang profesional.
- **Manajemen Buku (CRUD)**: Kelola katalog buku (Tambah, Edit, Hapus, Detail) dengan mudah.
- **Manajemen Member**: Mengelola data anggota perpustakaan.
- **Sirkulasi Peminjaman Otomatis**: Sistem persetujuan, peminjaman, dan pengembalian yang terintegrasi langsung dengan update stok buku otomatis.

---

## 🛠️ Installation Guide

Ikuti langkah-langkah detail ini untuk menjalankan aplikasi Library Maura di lingkungan lokal Anda:

1. **Clone repository ini:**
   ```bash
   git clone <repository-url>
   cd library-maura
   ```

2. **Install dependensi PHP dan Node.js:**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment:**
   Duplikat file `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```
   Atur koneksi database Anda di dalam file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=library_maura
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

5. **Jalankan Migrasi dan Seeder:**
   Ini akan membuat struktur tabel dan mengisi data awal (termasuk akun admin).
   ```bash
   php artisan migrate --seed
   ```
   > **Note:** Akun admin default yang di-generate oleh seeder:
   > - **Email:** `admin@maura.com`
   > - **Password:** `password`

6. **Jalankan Aplikasi:**
   Buka 2 terminal terpisah dan jalankan perintah berikut:
   
   Terminal 1 (Menjalankan server Laravel):
   ```bash
   php artisan serve
   ```
   
   Terminal 2 (Menjalankan Vite untuk memproses asset):
   ```bash
   npm run dev
   ```

Aplikasi sekarang dapat diakses melalui `http://localhost:8000`.

---

## 📁 Project Structure

Selama pengembangan, kami melakukan refactoring modular pada struktur tampilan (`resources/views`) untuk memastikan kode bersih dan mudah dikelola:

- **`resources/views/components/`**: Berisi komponen Blade yang dapat digunakan kembali.
- **`resources/views/visitor/`**: Modularisasi khusus untuk area publik (Visitor):
  - **`components/`**: Komponen spesifik untuk halaman visitor (seperti `book-card`, `category-filter`).
  - **`layouts/`**: Layout utama untuk halaman publik.
  - **`pages/`**: Halaman spesifik seperti Beranda, Katalog, dll.
- **`resources/views/admin/`**: Area khusus untuk dashboard dan fitur admin.

Pendekatan modular ini pada `visitor/components` memungkinkan pemisahan tanggung jawab yang lebih baik dan memudahkan pemeliharaan UI di masa mendatang.

---

## 🖼️ UI Preview

| Home Page / Catalog | Admin Dashboard |
| :---: | :---: |
| ![Home Page Placeholder](https://via.placeholder.com/600x400?text=Home+Page+UI) | ![Admin Dashboard Placeholder](https://via.placeholder.com/600x400?text=Admin+Dashboard+UI) |

---

## 💡 Closing

**Library Maura** dibangun dengan filosofi bahwa aplikasi perpustakaan tidak hanya harus fungsional, tetapi juga memberikan kesan visual yang memukau. Kami sangat mengutamakan User Experience (UX) modern untuk memastikan setiap interaksi terasa mulus, responsif, dan premium.

Terima kasih telah mengeksplorasi proyek ini!
