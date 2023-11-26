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
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Rombel</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Rombel</th>
                            <th>Kelas</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($data['siswa'] as $siswa) :?>
                        <tr>
                            <td><?= $siswa['nisn_siswa']; ?></td>
                            <td><?= $siswa['name_siswa']; ?></td>
                            <td><?= $siswa['rombel_siswa']; ?> </td>
                            <td><?= $siswa['jurusan_siswa']; ?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>