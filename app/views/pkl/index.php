<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pelatihan Kerja Lapangan</h1>
        <div class="d-inline-flex p-2">
            <?php if (isset($_SESSION['email'])) :?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Info PKL
                </button>
            <?php endif;?>
            <?php if (isset($_SESSION['email']) && !empty($data['pkl'])) : ?>
                <?php $firstPkl = $data['pkl'][0]; ?>
                <?php if (isset($firstPkl['id_info'])) : ?>
                    <button type="button" onclick="lihatData()" class="btn btn-warning" id="downloadButton">
                        Lihat Data
                    </button>
                <?php endif; ?>
        <?php endif; ?>
        </div>
    </div>



<div class="list-group mt-4">
    <?php foreach ($data['pkl'] as $pkl) : ?>
        <div>
            <a href="<?php if(isset($_SESSION['siswa'])) {
                echo BASEURL . "/pkl/daftar/" . $pkl['id_info'];
                }?>" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?= $pkl['title_info']; ?></h5>
                    <?php if (isset($_SESSION['email'])) : ?>
                        <button type="button" class="close text-danger" aria-label="Close" id="hapusButton_<?= $pkl['id_info']; ?>" onclick="hapusData('<?= $pkl['id_info']; ?>')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    <?php endif; ?>
                </div>
                <p class="mb-1"><?= $pkl['deks_info']; ?></p>
                <?php if ($pkl['jumlahPendaftar'] < $pkl['jml_pendaftar']) : ?>
                    <span class="badge badge-success">Tersedia</span>
                <?php else: ?>
                    <span class="badge badge-danger">Tidak Tersedia</span>
                <?php endif; ?>
            </a>
        </div>
    <?php endforeach; ?>
</div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Info PKL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?=BASEURL;?>/Pkl/tambah" method="POST">
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control"name="title" id="title" aria-describedby="">
                </div>
                <div class="form-group">
                    <label for="deks">Deksripsi</label>
                    <textarea class="form-control" type="text" name="deks" id="deks" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="jml">Jumlah Pendaftar</label>
                    <input class="form-control" type="number" name="jml" id="jml" rows="3"></input>
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
</div>





<script>
    function hapusData() {
        let konfirmasi = confirm('Anda akan sekaligus menghapus data pendaftaran!');

        if (konfirmasi) {

            let xhr = new XMLHttpRequest();
            let url = "<?=BASEURL;?>/pkl/hapus/<?= $pkl['id_info']; ?>";
            
            xhr.open("POST", url, true);
            xhr.onload = function () {

                if (xhr.status == 200) {

                    console.log(xhr.responseText);

                    window.location.href = "<?=BASEURL;?>/pkl";
                } else {
                    console.error("Error:", xhr.statusText);
                }
            };

            xhr.send();
        }
    }

    function lihatData() {

            let xhr = new XMLHttpRequest();
            let url = "<?=BASEURL;?>/pkl/data/";
            
            xhr.open("POST", url, true);
            xhr.onload = function () {

                if (xhr.status == 200) {

                    console.log(xhr.responseText);

                    window.location.href = "<?=BASEURL;?>/pkl/data";
                } else {
                    console.error("Error:", xhr.statusText);
                }
            };

            xhr.send();
    }
    

</script>
