<?php
$host = "localhost"; // Sesuaikan dengan host database Anda
$username = "root"; // Sesuaikan dengan username database Anda
$password = ""; // Sesuaikan dengan password database Anda
$database = "eabsen"; // Sesuaikan dengan nama database Anda

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);
$title  = 'Absensi Karyawan';

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

?>
