<?php
require 'C://xampp/htdocs/eabsen/koneksi.php';
//require 'session.php';

?>
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
<body class="container-fluid text-left" style="background-color: #E0E0E0; height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <h2>ABSENSI BLUD UPT ANGKUTAN KOTA BANDUNG</h2>
    <p>PORTAL ABSENSI BLUD UPT ANGKUTAN KOTA BANDUNG</p>
    <div class="card card-container" style="width: 800px; height: 430px;">
        <div class="card-body">
            <div class="container mt-3">
                <form action="/action_page.php" method="POST" enctype="multipart/form-data">
                <div class="mb-1 mt-3">
                    <h6 id="waktu"></h6><br>
                    <div class="row">
                        <div class="col">
                            <label for="nama">Nama</label>
                            <select class="form-control" id="nama" name="nama">
                                <option value="Pilih Nama">Pilih Nama</option>
                                <?php
                                    // Ambil data jabatan dari database
                                    $query = "SELECT nama FROM karyawan WHERE kategori='Koridor 2'"; // Ganti "jabatan" dengan nama tabel Anda
                                    $result = mysqli_query($conn, $query);

                                    if (!$result) {
                                        die("Error: " . mysqli_error($conn));
                                    }

                                    // Loop melalui data jabatan dan menambahkannya ke dropdown
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['id'] . '">' . $row['nama'] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="jabatan">Jabatan</label>
                            <select class="form-control" id="jabatan" name="jabatan">
                                <option value="Pilih Jabatan">Pilih Jabatan</option>
                                <?php
                                    // Ambil data jabatan dari database
                                    $query = "SELECT jabatan FROM karyawan WHERE kategori='Koridor 2'"; // Ganti "jabatan" dengan nama tabel Anda
                                    $result = mysqli_query($conn, $query);

                                    if (!$result) {
                                        die("Error: " . mysqli_error($conn));
                                    }

                                    // Loop melalui data jabatan dan menambahkannya ke dropdown
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['id'] . '">' . $row['jabatan'] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            <label for="foto">Ambil Selfie</label>
                            <input type="file" accept="image/*" class="form-control" id="foto" name="foto" capture="camera">
                        </div>
                        <div class="col">
                            <label for="keterangan">Keterangan</label>
                            <select class="form-control" id="keterangan" name="keterangan">
                                <option value="Pilih Opsi">Pilih Keterangan</option>
                                <option value="Keterangan 1">Hadir</option>
                                <option value="Keterangan 2">Izin</option>
                                <option value="Keterangan 3">Sakit</option>
                            </select>
                        </div>
                    </div><br>
                    <div class="mb-3">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Terkini" readonly>
                    </div>
                    <center><button type="submit" class="btn btn-primary">Simpan</button></center>
                </div>
            </div>

            <script>
                function getLocation() {
                    if ("geolocation" in navigator) {
                        navigator.geolocation.getCurrentPosition(async function (position) {
                            var latitude = position.coords.latitude;
                            var longitude = position.coords.longitude;
                            var lokasiElement = document.getElementById('lokasi');

                            try {
                                const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latitude}&lon=${longitude}`);
                                const data = await response.json();

                                if (data.display_name) {
                                    const locationName = data.display_name;
                                    lokasiElement.value = locationName;
                                } else {
                                    lokasiElement.value = "Lokasi tidak ditemukan";
                                }
                            } catch (error) {
                                console.error(error);
                                lokasiElement.value = "Terjadi kesalahan dalam mendapatkan lokasi";
                            }
                        });
                    } else {
                        alert("Geolocation tidak didukung di perangkat ini.");
                    }
                }

                // Panggil fungsi getLocation saat foto diambil
                document.getElementById('foto').addEventListener('change', function () {
                    getLocation();
                });
            </script>
        </div>
    </div>

    <!-- Menggunakan Bootstrap 4 JS (jQuery dan Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function updateDateTime() {
            var waktuElement = document.getElementById('waktu');
            var currentTime = new Date();
            
            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var day = days[currentTime.getDay()];
            
            var date = currentTime.getDate();
            
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var month = months[currentTime.getMonth()];
            
            var year = currentTime.getFullYear();
            
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();
            
            var formattedTime = day + ', ' + date + ' ' + month + ' ' + year + ' ' + hours + ':' + (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
            
            waktuElement.innerHTML = 'Selamat Datang! Silahkan Isi Kehadiran ' + formattedTime;
        }

        setInterval(updateDateTime, 1000); // Perbarui setiap 1 detik
    </script>
</body>
</html>
