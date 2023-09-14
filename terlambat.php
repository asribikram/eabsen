<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta dan CSS di sini -->
</head>
<body>
    <div id="terlambat">
        <?php
        // Mulai sesi jika belum ada
        session_start();

        // Periksa status absensi karyawan
        if (isset($_SESSION['absensi_status']) && $_SESSION['absensi_status'] === 'terlambat') {
            // Jika terlambat, tampilkan pesan terlambat
            echo '<h1>Anda Terlambat!</h1>';
            echo '<p>Mohon maaf, Anda telah melebihi waktu absensi.</p>';
            // Tampilkan instruksi atau pilihan tambahan jika diperlukan
        } else {
            // Jika tidak terlambat, berikan pilihan untuk mengakses absensi lagi
            echo '<h1>Anda sudah absen hari ini.</h1>';
            echo '<p>Anda dapat mengakses absensi lagi besok.</p>';
            // Tambahkan tombol atau instruksi tambahan jika diperlukan
        }

        // Hapus status absensi dari sesi
        unset($_SESSION['absensi_status']);
        ?>
    </div>
</body>
</html>
