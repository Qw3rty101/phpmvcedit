<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../app/config/config.php'; // Sertakan file konfigurasi
    require_once '../app/core/Database.php'; // Sertakan file koneksi.php

    $database = new Database(); // Buat objek Database

    // Ambil data yang dimasukkan oleh pengguna
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk memeriksa apakah email cocok dalam database
    $query = "SELECT * FROM tbl_sas_admin WHERE email_admin = :email";
    $database->query($query);
    $database->bind(':email', $email);

    $result = $database->resultSet();

    if (count($result) > 0) {
        // Email ditemukan dalam database
        $row = $result[0];
        $email = $row['email_admin'];

        // Verifikasi kata sandi yang di-hash
        if ($password == $row['password_admin']) {
            // Login berhasil, set session
            $_SESSION['email'] = $email;
            header('Location: home'); // Redirect ke halaman setelah login berhasil
        } else {
            // Login gagal
            echo "Login gagal. Email atau kata sandi salah.";
        }
    } else {
        // Email tidak ditemukan dalam database
        echo "Login gagal. Email tidak terdaftar.";
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      body {
        background-color: #2D54C6;
      }

      .display-5 {
        color : #F5F6F9;
        margin-bottom : 20px;
        font-weight : bold;
      }
      
      .form-control {
        border: 2px solid #4E73DF;
      }
      
      label {
        font-weight : 400;
        color : #858796;
      }
      
      .btn {
        font-weight : bold;
      }
      
    </style>
  </head>
  <body>   

<div class="container-md text-center" style="margin-top: 200px;">
  <div class="row">
    <div class="col"></div>
    <div class="col">
    <h1 class="display-5">Welcome Admin</h1>
    <form action="loginAdmin.php" method="post">
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
            <label for="email">Email</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="password">
            <label for="password">Password</label>
        </div>
        <button type="submit" class="btn btn-primary btn-lg mt-3">Login</button>
    </form>
    </div>
    <div class="col"></div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
