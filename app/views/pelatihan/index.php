<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Workshop / Bootcamp</h1>
        <!-- Button trigger modal -->
        <?php
        if (isset($_SESSION['email'])) {
            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">';
            echo 'Tambah Workshop / Bootcamp';
            echo '</button>';
        }
        ?>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Info Workshop / Bootcamp</h5>
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
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" class="form-control"name="link" id="link" aria-describedby="" placeholder="tulis / paste link disini">
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
    <?php for ($i = 0; $i < 4; $i++) : ?>
        <div class="col-xl-4 col-md-6 mb-4" style="margin-left: -3px;">
            <div class="p-3">
                <div class="card mx-auto" style="width: 18rem;">
                    <div class="card-body">
                        <?php if (isset($_SESSION['email'])) : ?>
                            <button type="button" class="close text-danger" aria-label="Close" id="hapusButton_<?= $pkl['id_info']; ?>" onclick="hapusData('<?= $pkl['id_info']; ?>')">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        <?php endif; ?>
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-info">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endfor; ?>
</div>




</div>

