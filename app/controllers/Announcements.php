<?php

session_start();
class Announcements extends Controller {
    public function index() {
        
        $data['judul'] = 'Pengumuman';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['ann'] = $this->model('pengumuman')->getAnn();
        $this->view('templates/header', $data);
        $this->view('announcements/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('pengumuman')->addAnn($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/announcements');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/announcements');
            exit;
        }

        // var_dump($_POST);
    }

    public function hapus($id)
    {
        if( $this->model('pengumuman')->delAnn($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/announcements');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/announcements');
            exit;
        }
    }
}

?>