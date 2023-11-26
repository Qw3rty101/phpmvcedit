<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengumuman</h1>
        <!-- Button trigger modal -->
        <?php
        if (isset($_SESSION['email'])) {
            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">';
            echo 'Tambah Pengguna';
            echo '</button>';
        }
        ?>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Pengumuman</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="<?=BASEURL;?>/announcements/tambah" method="POST">
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" class="form-control"name="title" id="title" aria-describedby="">
            </div>
            <div class="form-group">
                    <label for="deks">Deksripsi</label>
                    <textarea class="form-control" type="text" name="deks" id="deks" rows="3"></textarea>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    
    <div class="row">
        <!--  -->
        <?php foreach ($data['ann'] as $ann) : ?>
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-info text-uppercase"><?= $ann['title_ann']; ?></div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 text-gray-800"><?= $ann['content_ann']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                        <?php if (isset($_SESSION['email'])) : ?>
                            <a href="<?=BASEURL;?>/announcements/hapus/<?= $ann['id_ann']; ?>" class="btn btn-danger btn-circle">
                                <i class="fas fa-trash"></i>
                            </a>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!--  -->
    </div>
</div>

