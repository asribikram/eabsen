<?php
require 'C:/xampp/htdocs/eabsen/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
<div class="container-fluid text-left" style="background-color: #E0E0E0; height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <h2>ABSENSI BLUD UPT ANGKUTAN KOTA BANDUNG</h2>
    <p>PORTAL ABSENSI BLUD UPT ANGKUTAN KOTA BANDUNG</p>
    <div class="card card-container" style="width: 800px; height: 420px;">
        <div class="card-body">
            <div class="container mt-3">
                <form action="/action_page.php" method="POST" enctype="multipart/form-data">
                <div class="mb-1 mt-3">
                    <h6 id="waktu"></h6>
                    <label for="nama">Nama</label>
                    <select class="form-control" id="nama" name="nama">
                        <option value="Pilih Nama">Pilih Nama</option>
                        <option value="Nama 1">Nama 1</option>
                        <option value="Nama 2">Nama 2</option>
                    </select>
                </div>
                <div class="mb-1">
                    <label for="jabatan">Jabatan</label>
                    <select class="form-control" id="jabatan" name="jabatan">
                        <option value="Pilih Jabatan">Pilih Jabatan</option>
                        <option value="Jabatan 1">Jabatan 1</option>
                        <option value="Jabatan 2">Jabatan 2</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="foto">Ambil Selfie</label>
                    <input type="file" capture="camera" accept="image/*" class="form-control" id="foto" name="foto">
                </div>
                <div class="mb-3">
                    <label for="keterangan">Keterangan</label>
                    <select class="form-control" id="keterangan" name="keterangan">
                        <option value="Pilih Opsi">Pilih Keterangan</option>
                        <option value="Keterangan 1">Hadir</option>
                        <option value="Keterangan 2">Izin</option>
                        <option value="Keterangan 2">Sakit</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Terkini" readonly>
                </div>
                    <center><button type="submit" class="btn btn-primary">Simpan</button></center>
                </div>
            </div>

<!-- <script src=”geo-min.js” type=”text/javascript” charset=”utf-8″></script>
    <script>
        if(geo_position_js.init()){
            geo_position_js.getCurrentPosition(success_callback,error_callback,{enableHighAccuracy:true});
        }
        else{
            div_isi=document.getElementById(“div_isi”);
            div_isi.innerHTML =”Tidak ada fungsi geolocation”;
        }

        function success_callback(p)
        {
            latitude=p.coords.latitude ;
            longitude=p.coords.longitude;
            pesan=’posisi:’+latitude+’,’+longitude;
            pesan = pesan + “<br/>”;
            pesan = pesan + ‘<img src=”https://maps.googleapis.com/maps/api/staticmap?size=400×400&amp;zoom=13&amp;markers=color:red%7Clabel:C%7C’+latitude +’,’+longitude+'”/>’;
            div_isi=document.getElementById(“div_isi”);
            //alert(pesan); 
            div_isi.innerHTML =pesan;
        }
        
        function error_callback(p)
        {
            div_isi=document.getElementById(“div_isi”);
            div_isi.innerHTML =’error=’+p.message;
        }        
    </script>
    <div id=”div_isi”>
    </div> -->

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
            
            waktuElement.innerHTML = 'Selamat Datang ! Silahkan Isi Kehadiran ' + formattedTime;
        }

        setInterval(updateDateTime, 1000); // Perbarui setiap 1 detik
    </script>

</body>
</html>