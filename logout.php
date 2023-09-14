<?php
    require 'C:/xampp/htdocs/eabsen/koneksi.php';
    unset($_SESSION['login']);
        session_destroy();
        header("Location: C/xampp/htdocs/eabsen/index.php");
?>