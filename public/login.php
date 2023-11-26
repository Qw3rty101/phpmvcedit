<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../app/config/config.php'; // Sertakan file koneksi.php
    require_once '../app/core/Database.php'; // Sertakan file koneksi.php

    $database = new Database(); // Buat objek Database
    $koneksi = $database->getConnection();

    // Ambil data yang dimasukkan oleh pengguna
    $name = $_POST['name'];
    $nisn = $_POST['nisn'];

    // Query untuk memeriksa apakah nama cocok dalam database
    $query = "SELECT * FROM tbl_sas_siswa WHERE name_siswa = :name";
    $database->query($query);
    $database->bind(':name', $name);

    $result = $database->resultSet();

    if (count($result) > 0) {
        // Nama ditemukan dalam database
        $row = $result[0];
        $name = $row['name_siswa'];

        // Verifikasi NISN yang di-hash
        if ($nisn == $row['nisn_siswa']) {
            // Login berhasil, set session
            $_SESSION['siswa'] = $row['id_siswa'];
            header('Location: home'); // Redirect ke halaman setelah login berhasil
        } else {
            // Login gagal
            echo "Login gagal. NISN atau kata sandi salah.";
        }
    } else {
        // Nama tidak ditemukan dalam database
        echo "Login gagal. Nama tidak terdaftar.";
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
  </head>
  <body>   

<div class="container-md text-center" style="margin-top: 200px;">
  <div class="row">
    <div class="col"></div>
    <div class="col">
    <h1 class="display-5">Login</h1>
    <form action="login.php" method="post">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" id="name" placeholder="name@example.com">
            <label for="name">Nama Lengkap</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="nisn" id="nisn" placeholder="nisn">
            <label for="nisn">NISN</label>
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
