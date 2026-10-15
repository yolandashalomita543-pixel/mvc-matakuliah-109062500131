CREATE DATABASE IF NOT EXISTS akademik
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE akademik;

CREATE TABLE IF NOT EXISTS mata_kuliah (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_mk VARCHAR(10) NOT NULL UNIQUE,
    nama_mk VARCHAR(100) NOT NULL,
    sks TINYINT UNSIGNED NOT NULL,
    semester TINYINT UNSIGNED NOT NULL,
    dosen VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO mata_kuliah (kode_mk, nama_mk, sks, semester, dosen) VALUES
('IF101', 'Algoritma dan Pemrograman', 3, 1, 'Dosen A'),
('IF102', 'Sistem Operasi', 3, 2, 'Dosen B'),
('IF103', 'Jaringan Komputer', 3, 3, 'Dosen C'),
('SI201', 'Sistem Basis Data', 3, 3, 'Dosen D'),
('SI202', 'Analisis dan Perancangan Sistem Informasi', 3, 4, 'Dosen E'),
('SI203', 'Pemodelan Proses Bisnis', 3, 4, 'Dosen F'),
('SI301', 'Perancangan Interaksi', 3, 5, 'Dosen G'),
('SI302', 'Pengembangan Aplikasi Website', 3, 5, 'Dosen H'),
('SI303', 'Sistem Enterprise', 3, 6, 'Dosen I'),
('TI201', 'Statistika Industri', 3, 4, 'Dosen J');