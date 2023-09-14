<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABSENSI BLUD UPT ANGKUTAN KOTA BANDUNG</title>
    <!-- Menggunakan Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Menggunakan font dari Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <!-- Memasukkan style.css Anda jika diperlukan -->
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #E0E0E0">
    <div>
        <h1>ABSENSI BLUD UPT ANGKUTAN KOTA BANDUNG</h1>
        <p>PORTAL ABSENSI BLUD UPT ANGKUTAN KOTA BANDUNG</p>
    </div>

    <div style="text-align: center; margin-top: 100px; display: flex; flex-direction: column; align-items: center;">
        <h3>SELAMAT DATANG</h3><br>
        <div class="row">
            <div class="col">
                <a id="karyawan-button" href="waktu.php" class="btn btn-primary btn-block">KARYAWAN</a>
            </div>
            <div class="col">
                <a href="admin/login.php" class="btn btn-primary btn-block">ADMIN</a>
            </div>
        </div>
    </div>

    <!-- Menggunakan Bootstrap 4 JS (jQuery dan Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    // Fungsi untuk mengatur ketersediaan tombol absensi karyawan
    function checkAbsensiAvailability() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        
        // Waktu absensi pagi: 06:00 - 09:00
        var pagiStart = 6;
        var pagiEnd = 24;

        // Waktu absensi sore: 16:30 - 18:00
        var soreStart = 16;
        var soreEnd = 18;
        
        // Ambil elemen tombol karyawan
        var karyawanButton = document.querySelector("#karyawan-button");

        // Cek waktu saat ini dan atur ketersediaan tombol
        if (
            (hours >= pagiStart && hours < pagiEnd) || 
            (hours === soreStart && minutes <= 30)
        ) {
            // Waktu absensi sedang berlangsung, arahkan ke koridor.php
            karyawanButton.setAttribute("href", "menu/koridor.php");
        }
    }

    // Panggil fungsi saat halaman dimuat
    checkAbsensiAvailability();
</script>
</body>
</html>

