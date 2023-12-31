<?php 

session_start();
class Pkl extends Controller {
    public function index()
    {
        // session_start();
        // $idSiswa = $_SESSION['siswa'];
        $data['judul'] = 'Pelatihan Kerja Lapangan';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['pkl'] = $this->model('Pkl_model')->getPkl();

        // Misalnya, kita ambil id_info dari data pkl pertama (indeks 0)
        $idInfo = !empty($data['pkl']) ? $data['pkl'][0]['id_info'] : null;

        $data['jumlahPendaftar'] = $this->model('Pkl_model')->countPendaftar($idInfo);
        if ($idInfo !== null) {
            // Panggil metode countPendaftar dari model Pkl_model
        } else {
            // Handle jika tidak ada data pkl atau id_info tidak ditemukan
            $data['jumlahPendaftar'] = 0;
        }
        foreach ($data['pkl'] as &$pkl) {
            $pkl['jumlahPendaftar'] = $this->model('Pkl_model')->countPendaftar($pkl['id_info']);
        }
        
        $this->view('templates/header', $data);
        $this->view('pkl/index', $data);
        $this->view('templates/footer');
    }

    public function download()
    {
        // session_start();
        
        if (!isset($_SESSION['email'])) {
            header('Location:' . BASEURL . '/pkl'); 
            exit();
        }
        $data['judul'] = 'Pelatihan Kerja Lapangan';
        $data['pkl'] = $this->model('Pkl_model')->downloadPkl();
        $this->view('pkl/download', $data);
    }

    public function data()
    {
        // session_start();
        
        if (!isset($_SESSION['email'])) {
            header('Location:' . BASEURL . '/pkl'); 
            exit();
        }
        $data['judul'] = 'Pelatihan Kerja Lapangan';
        $data['pkl'] = $this->model('Pkl_model')->downloadPkl();
        $this->view('pkl/data', $data);
    }

    public function daftar($id)
    {
        // if( $this->model('Pkl_model')->daftar($id) > 0 ) {
        //     Flasher::setFlash('berhasil', 'dihapus', 'success');
        //     header('Location: ' . BASEURL . '/pkl');
        //     exit;
        // } else {
        //     Flasher::setFlash('gagal', 'dihapus', 'danger');
        //     header('Location: ' . BASEURL . '/pkl');
        //     exit;
        // }

        // var_dump($id);

        $result = $this->model('Pkl_model')->daftar($id);
        if ($result === true) {
            echo "<script>alert('Anda berhasil mendaftar'); window.location.href='" . BASEURL . "/pkl';</script>";
            exit;
        } else {
            echo "<script>alert('" . $result . "'); window.location.href='" . BASEURL . "/pkl';</script>";
            exit;
        }
        
    }
    
    public function tambah()
    {
        if( $this->model('Pkl_model')->addPkl($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl');
            exit;
        }

        // var_dump($_POST);
    }

    public function hapus($id)
    {
        if( $this->model('Pkl_model')->delPkl($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl');
            exit;
        }
    }

    public function hapusSiswa($id)
    {
        if( $this->model('Pkl_model')->delSis($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/data');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/data');
            exit;
        }
    }

}