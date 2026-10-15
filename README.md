# MVC PHP Native - Data Mata Kuliah

Aplikasi CRUD sederhana untuk mengelola data mata kuliah dengan pola Model-View-Controller pada PHP Native.

## Kebutuhan
- PHP 8.0 atau lebih baru
- MySQL/MariaDB
- XAMPP atau Laragon
- Git

## Instalasi
1. Clone atau salin project ke `htdocs` (XAMPP) atau `www` (Laragon).
2. Import `database/akademik.sql` lewat phpMyAdmin.
3. Sesuaikan koneksi pada `config/database.php`.
4. Buka `http://localhost/mvc-matakuliah/public/index.php`.

## Struktur MVC
- `app/models/` : akses dan operasi data.
- `app/controllers/` : alur request dan pemanggilan Model/View.
- `app/views/` : tampilan HTML.
- `config/` : konfigurasi koneksi database.
- `database/` : skema dan data awal SQL.
- `public/` : entry point dan aset (CSS).

## Fitur
- Menampilkan, menambah, mengubah, dan menghapus data mata kuliah
- Validasi input dan pesan berhasil/gagal
- Prepared statement (PDO) dan escaping output

## Histori Git
* 544ce35 (HEAD -> main) feat: add complete CRUD routing
* 9d5fca8 feat: add complete course CRUD views and styling
* e859f32 feat: add complete course CRUD controller with validation
* 613402a feat: add complete course CRUD model
* dabfa21 feat: add PDO database connection
* 59618bb feat: add course database schema and seed data
* a1f8a53 chore: initialize mvc php native project
