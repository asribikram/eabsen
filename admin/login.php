<?php
//session_start(); // Mulai sesi

require 'C:/xampp/htdocs/eabsen/koneksi.php';

if(isset($_SESSION['login'])) {
    header("Location: C:/xampp/htdocs/eabsen/index.php");
    //exit; // Keluar dari skrip jika sudah login
}

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username)) {
        echo '<script>';
        echo 'alert("Username harus diisi")';
        echo '</script>';
    } else if(empty($password)) {
        echo '<script>';
        echo 'alert("Password harus diisi")';
        echo '</script>';
    } else {
        $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

        if (!$query) {
            die("Error dalam menjalankan query: " . mysqli_error($conn));
        }

        if(mysqli_num_rows($query) === 1) {
            $data = mysqli_fetch_assoc($query);
            // Membandingkan password yang dimasukkan oleh pengguna dengan password di database (tanpa hash)
            if($password === $data['password']) {
                $_SESSION['login'] = $data;
                header("Location: index-admin.php"); // Mengarahkan ke halaman yang benar
                exit;
            } else {
                echo '<script>';
                echo 'alert("Password anda salah")';
                echo '</script>';
            }
        } else {
            echo '<script>';
            echo 'alert("Username tidak ditemukan")';
            echo '</script>';
        }
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Login</title> <!-- Pastikan Anda mengisi title dengan sesuai -->

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
    <main class="form-signin">
      <form method="post">
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        <div class="form">
          <label for="input">Username</label>
          <input type="text" name="username" class="form-control" id="input" placeholder="Username">
        </div>
        <div class="form">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <br>
        <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Masuk</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
      </form>
    </main>

  </body>
</html>