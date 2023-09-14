<?php
    require 'C:/xampp/htdocs/eabsen/koneksi.php';
?>

<!DOCTYPE html>
<html>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid text-center" style="background-color: #E0E0E0; height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <h2>ABSENSI BLUD UPT ANGKUTAN KOTA BANDUNG</h2>
        <p>PORTAL ABSENSI BLUD UPT ANGKUTAN KOTA BANDUNG</p>
        <div class="card card-container" style="width: 800px; height: 422px;">
            <div class="card-body">
                    <br>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle mx-auto d-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%; height: 50px;">
                            Pilih Nomor Koridor
                        </button>
                        <br><br>
                        <ul class="dropdown-menu" role="menu" style="width: 100%;">
                            <li><a href="subkoridor.php" class="text-center">Koridor 1 ( Cibiru - Cibereum )</a></li>
                            <li class="divider"></li>
                            <li><a href="subkoridor2.php" class="text-center">Koridor 2 ( Cibereum - Cicaheum )</a></li>
                            <li class="divider"></li>
                            <li><a href="subkoridor3.php" class="text-center">Koridor 3 ( Cicaheum - Sarijadi )</a></li>
                            <li class="divider"></li>
                            <li><a href="subkoridor4.php" class="text-center">Koridor 4 ( Leuwipanjang - Antapani )</a></li>
                            <li class="divider"></li>
                            <li><a href="subkoridor5.php" class="text-center">Koridor 5 ( Si - Hall - Antapani )</a></li>
                            <li class="divider"></li>
                            <li><a href="bandros.php" class="text-center">Bandros</a></li>
                        </ul>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>