<?php 

session_start();
class Pelatihan extends Controller {
    public function index()
    {
        $data['judul'] = 'Pelatihan';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['skill'] = $this->model('Skill_model')->getSkill();
        $this->view('templates/header', $data);
        $this->view('pelatihan/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('Skill_model')->addSkill($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pelatihan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pelatihan');
            exit;
        }

        // var_dump($_POST);
    }

    public function hapus($id)
    {
        if( $this->model('Skill_model')->delSkill($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pelatihan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pelatihan');
            exit;
        }
    }
}