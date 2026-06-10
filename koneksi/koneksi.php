<?php
// Konfigurasi Database (Default XAMPP)
$host = "localhost";
$user = "root";
$pass = "";
$db   = "showroom_db"; // Disamakan dengan nama file showroom_db.sql kamu

// Membuat koneksi ke MySQL
$conn = mysqli_connect($host, $user, $pass, $db);

// Memeriksa apakah koneksi berhasil
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Catatan: Jika koneksi berhasil, halaman akan kosong (putih bersih). 
// Itu tandanya koneksi sudah aman dan siap digunakan di file lain.
?>