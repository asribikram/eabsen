<?php
// Mulai sesi jika belum ada
session_start();

// Waktu Absensi (contoh: 08:00)
$waktuAbsensi = strtotime("08:00");

// Waktu Absensi Karyawan
$waktuKaryawan = strtotime(date("H:i"));

// Cek Keterlambatan
if ($waktuKaryawan > $waktuAbsensi) {
    // Set status absensi karyawan menjadi terlambat
    $_SESSION['absensi_status'] = 'terlambat';
    header("Location: terlambat.php");
    exit();
} else {
    // Simpan data absensi jika tidak terlambat
    // Misalnya, Anda dapat menyimpan data ke database
    // dan memberikan pesan sukses
    // header("Location: sukses-absensi.php");
    // exit();
}
?>
