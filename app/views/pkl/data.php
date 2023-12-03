<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <i class="bi bi-buildings"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Adka</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="../home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="../announcements">
                    <i class="bi bi-megaphone-fill"></i>
                    <span>Pengumuman</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Heading -->

            <!-- Nav Item - Pages Collapse Menu -->

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
                echo '            <a class="collapse-item" href="../tableData">Table Data</a>';
                echo '            <a class="collapse-item" href="../Pkl">PKL</a>';
                echo '            <a class="collapse-item" href="../Pelatihan">Workshop / Bootcamp</a>';
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
                <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <!-- <?php $firstPkl = $data['pkl'][0]; ?> -->
                <?php if (isset($firstPkl['id_info'])) : ?>
                    <button type="button" onclick="downloadData()" class="btn btn-success" id="downloadButton">
                        Download Data PKL
                    </button>
                <?php endif; ?>
                    <thead>
                        <tr>
                            <th>Tempat PKL</th>
                            <th>Nama</th>
                            <th>No WhatsApp</th>
                            <th>Kelas</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tempat PKL</th>
                            <th>Nama</th>
                            <th>No WhatsApp</th>
                            <th>Kelas</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    foreach ($data['pkl'] as $pklData) {
                        echo "<tr>";
                        echo "<td style='padding-right:10px;padding-left:10px;'>" . $pklData["title_info"] . "</td>";
                        echo "<td style='padding-right:10px;padding-left:10px;'>" . $pklData["name_siswa"] . "</td>";
                        echo "<td style='padding-right:10px;padding-left:10px;'>" . $pklData["noWA_siswa"] . "</td>";
                        echo "<td style='padding-right:10px;padding-left:10px;'>" . $pklData["rombel_siswa"] . "</td>";
                        echo "<td style='padding-right:10px;padding-left:10px;'>
                                <a href='" . BASEURL . "/pkl/data/hapus" . $pklData['id_daftar'] . "' class='btn btn-danger btn-circle'>
                                <i class='fas fa-trash'></i>
                                </a>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Our Website <?= date("Y") ?></span><br><br>
                        <span>Team 51</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah yakin untuk logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script>
            function downloadData() {
        let konfirmasi = confirm('Download Semua Data?');

        if (konfirmasi) {

            let xhr = new XMLHttpRequest();
            let url = "<?=BASEURL;?>/pkl/download/";
            
            xhr.open("POST", url, true);
            xhr.onload = function () {

                if (xhr.status == 200) {

                    console.log(xhr.responseText);

                    window.location.href = "<?=BASEURL;?>/pkl/download";
                } else {
                    console.error("Error:", xhr.statusText);
                }
            };

            xhr.send();
        }
    }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="../vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> -->

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>