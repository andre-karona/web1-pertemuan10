<?php
$host = '127.0.0.1';
$namaDatabase = 'web1_pertemuan09'; // Pastikan nama DB sesuai modul 9 Anda
$pengguna = 'root';
$kataSandi = ''; // Kosongkan jika menggunakan XAMPP bawaan

// Mengaktifkan mode error reporting untuk MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Membuat koneksi ke server MySQL
    $koneksi = mysqli_connect($host, $pengguna, $kataSandi, $namaDatabase);
    // Mengatur karakter encoding ke utf8mb4 demi keamanan teks
    mysqli_set_charset($koneksi, 'utf8mb4');
} catch (mysqli_sql_exception $e) {
    // Menampilkan pesan ringkas jika koneksi gagal tanpa membocorkan kredensial
    exit('Koneksi database gagal. Periksa server, nama database, dan akun lokal.');
}

// Fungsi pengaman (escaping) untuk output ke HTML
function e($nilai)
{
    return htmlspecialchars((string) $nilai, ENT_QUOTES, 'UTF-8');
}
