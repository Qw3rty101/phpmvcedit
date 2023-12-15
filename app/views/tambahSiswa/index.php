<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Siswa</h1>
    </div>

    <form action="<?=BASEURL;?>/tambahSiswa/tambah" method="post">
        <div class="form-group">
            <div class="row">
                <div class="col-xl-6 col-md-6 mb-4">
                    <label for="name">Nama Siswa</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="" placeholder="Nama Siswa">
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <label for="nisn">NISN Siswa</label>
                    <input type="number" class="form-control" id="nisn" name="nisn" aria-describedby="" placeholder="NISN Siswa">
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <label for="address">Alamat Siswa</label>
                    <textarea class="form-control" id="address" name="address" aria-describedby="" placeholder="Alamat Siswa" rows="4"></textarea>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <label for="nowa">No WhatsApp Siswa</label>
                    <input type="number" class="form-control" id="nowa" name="nowa" aria-describedby="" placeholder="No WA Siswa">
                    <label for="jurusan">Jurusan Siswa</label>
                    <select class="form-control" id="jurusan" name="jurusan">
                        <option>RPL</option>
                        <option>TKJ</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>

</div>