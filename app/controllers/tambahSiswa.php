<?php


class tambahSiswa extends Controller {
    public function index() {
        session_start();
        
        if (!isset($_SESSION['email'])) {
            header('Location: home'); 
            exit();
        }
        $data['judul'] = 'Tambah Siswa';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['siswa'] = $this->model('Siswa_model')->getSiswa();
        $this->view('templates/header', $data);
        $this->view('tambahSiswa/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('Siswa_model')->tambahSiswa($_POST) > 0 ) {
            // Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            // header('Location: ' . BASEURL . '/tambahSiswa');
            echo "<script>alert('Siswa berhasil ditambahkan!'); window.location.href='" . BASEURL . "/tambahSiswa';</script>";
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/tambahSiswa');
            exit;
        }

        // var_dump($_POST);
    }
}

?>