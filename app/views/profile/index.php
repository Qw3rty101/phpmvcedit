<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Profile</h1>
    <!-- <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div> -->
<div class="row">
<!-- Area Chart -->
<div class="col-xl-4 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Photo</h6>
            <div class="dropdown no-arrow">
            </div>
        </div>

        <?php
        if (is_array($data['siswa'])) {
            $siswa = $data['siswa'];
            
            $fotoPath = "img/" . $siswa['foto_siswa'];
            
            if (file_exists($fotoPath)) {
                echo "<img src='$fotoPath' class='rounded mx-auto d-block mt-4' alt='...' width='200'>";
            } else {
                echo "<img src='img/pngwing.com.png' class='rounded mx-auto d-block mt-4' alt='...' width='200'>";
                // atau Anda dapat menampilkan pesan kesalahan
                // echo "File gambar tidak ditemukan.";
            }
        } else {
            echo "<img src='img/pngwing.com.png' class='rounded mx-auto d-block mt-4' alt='...' width='200'>";
            // echo "Data siswa tidak valid.";
        }
        ?>


        <!-- Card Body -->
        <div class="card-body">
            <div class="">
            </div>
        </div>
    </div>
</div>

<!-- Pie Chart -->
<div class="col-xl-8 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Informations</h6>
            <div class="dropdown no-arrow">
                
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
        <?php
        if (is_array($data['siswa'])) {
            $siswa = $data['siswa'];
        ?>
        
        <p class="h5 font-weight-bold">Nama Lengkap</p>
        <p class="h6 mb-4"><?= $siswa['name_siswa']; ?></p>
        <hr>
        <p class="h5 font-weight-bold">NISN</p>
        <p class="h6 mb-4"><?= $siswa['nisn_siswa']; ?></p>
        <hr>
        <p class="h5 font-weight-bold">Alamat</p>
        <p class="h6 mb-4"><?= $siswa['address_siswa']; ?></p>
        <hr>
        <p class="h5 font-weight-bold">No WhatsApp</p>
        <p class="h6 mb-4"><?= $siswa['noWA_siswa'] ?></p>
        <hr>
        <p class="h5 font-weight-bold">Jurusan</p>
        <p class="h6 mb-4"><?= $siswa['jurusan_siswa'] ?></p>
        <hr>
        <p class="h5 font-weight-bold">Kelas</p>
        <p class="h6 mb-4"><?= $siswa['rombel_siswa'] ?></p>

        <?php
        } else {
            echo "Data siswa tidak valid.";
        }
        ?>
        </div>
    </div>
    <a href="#" class="btn btn-warning btn-icon-split mb-4">
        <span class="icon text-white-50">
            <i class="fas fa-exclamation-triangle"></i>
        </span>
        <button class="btn btn-warning text" data-toggle="modal" data-target="#exampleModal">
            Edit Profile
        </button>
    </a>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="<?=BASEURL;?>/profile/edit" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input value="<?= $siswa['name_siswa']; ?>" type="text" class="form-control"name="name" id="name" aria-describedby="">
            </div>
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input value="<?= $siswa['nisn_siswa'] ?>" class="form-control" type="number" name="nisn" id="nisn" readonly></input>
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <input value="<?= $siswa['address_siswa'] ?>" class="form-control" type="text" name="address" id="address"></input>
            </div>
            <div class="form-group">
                <label for="noWA">No WhatsApp</label>
                <input value="<?= $siswa['noWA_siswa'] ?>" class="form-control" type="number" name="noWA" id="noWA"></input>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input value="<?= $siswa['jurusan_siswa'] ?>" class="form-control" type="text" name="jurusan" id="jurusan" readonly></input>
            </div>
            <div class="form-group">
                <label for="rombel">Kelas</label>
                <input value="<?= $siswa['rombel_siswa'] ?>" class="form-control" type="text" name="rombel" id="rombel" readonly></input>
            </div>
            <div class="form-group">
                <label for="foto">Foto Profile</label>
                <input type="file" class="form-control-file" name="foto" id="foto">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
</div>
</div>