<?php
require 'koneksi.php';

// Menolak akses jika halaman ini dibuka langsung (menggunakan GET) melalui URL
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Gunakan tombol Hapus pada daftar produk.');
}

// Memvalidasi ID yang dikirim dari form dengan gaya tradisional agar aman dari error tanda tanya
$idInput = isset($_POST['id']) ? $_POST['id'] : null;
$id = filter_var($idInput, FILTER_VALIDATE_INT);

if ($id === false || $id === null || $id < 1) {
    http_response_code(400);
    exit('ID produk tidak valid.');
}

// Menjalankan operasi DELETE dengan Prepared Statement
$stmt = mysqli_prepare($koneksi, 'DELETE FROM produk WHERE id_produk = ?');
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

// Mengalihkan kembali ke halaman utama
header('Location: index.php');
exit;
