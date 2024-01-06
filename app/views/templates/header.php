<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['email']) && !isset($_SESSION['siswa'])) {
    // Pengguna tidak memiliki sesi (belum login), arahkan kembali ke halaman login
    header('Location: ../public/login.php'); // Ganti dengan halaman login Anda
    exit;
  }



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $data['judul']; ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
                <div class="sidebar-brand-icon">
                    <i class="bi bi-buildings"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Adka</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="announcements">
                    <i class="bi bi-megaphone-fill"></i>
                    <span>Pengumuman</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Heading -->

            <!-- Nav Item - Pages Collapse Menu -->
            <?php
            if (isset($_SESSION['siswa'])) {
                // Tampilkan item menu jika sesi 'email' ada
                echo '<li class="nav-item active">';
                echo '    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">';
                echo '        <i class="bi bi-bookmark-fill"></i>';
                echo '        <span>Pembelajaran</span>';
                echo '    </a>';
                echo '    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">';
                echo '        <div class="bg-white py-2 collapse-inner rounded">';
                echo '            <h6 class="collapse-header">Menu :</h6>';
                echo '            <a class="collapse-item" href="Pkl">PKL</a>';
                echo '            <a class="collapse-item" href="Pelatihan">Workshop / Bootcamp</a>';
                echo '        </div>';
                echo '    </div>';
                echo '</li>';
            }
            ?>

            <?php
            if (isset($_SESSION['email'])) {
                // Tampilkan item menu hanya jika sesi 'email' ada
                echo '<li class="nav-item active">';
                echo '    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"';
                echo '        aria-expanded="true" aria-controls="collapseTwo">';
                echo '        <i class="bi bi-bookmark-fill"></i>';
                echo '        <span>Data siswa</span>';
                echo '    </a>';
                echo '    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">';
                echo '        <div class="bg-white py-2 collapse-inner rounded">';
                echo '            <h6 class="collapse-header">Menu :</h6>';
                echo '            <a class="collapse-item" href="tableData">Table Data</a>';
                echo '            <a class="collapse-item" href="Pkl">PKL</a>';
                echo '            <a class="collapse-item" href="Pelatihan">Workshop / Bootcamp</a>';
                echo '            <a class="collapse-item" href="TambahSiswa">Tambah Siswa</a>';
                echo '        </div>';
                echo '    </div>';
                echo '</li>';
            }
            ?>

            <?php
            if (isset($_SESSION['siswa'])) {
                // Tampilkan struktur HTML jika sesi 'email' ada
                echo '<li class="nav-item active">';
                echo '    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"';
                echo '        aria-expanded="true" aria-controls="collapseUtilities">';
                echo '        <i class="fas fa-fw fa-wrench"></i>';
                echo '        <span>Konfigurasi</span>';
                echo '    </a>';
                echo '    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"';
                echo '        data-parent="#accordionSidebar">';
                echo '        <div class="bg-white py-2 collapse-inner rounded">';
                echo '            <h6 class="collapse-header">Menu :</h6>';
                echo '            <a class="collapse-item" href="profile">Profile</a>';
                echo '        </div>';
                echo '    </div>';
                echo '</li>';
            }
            ?>
            <!-- </li> -->
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none "></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" href="logout.php">
                                <span class="text-secondary font-weight-bold">Logout</span>
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->