<?php 

class Profile extends Controller {
    public function index()
    {
        session_start();
        $id = $_SESSION['siswa'];

        $data['judul'] = 'Profile';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['siswa'] = $this->model('Profile_Model')->siswaProfile($id);
        $this->view('templates/header', $data);
        $this->view('profile/index', $data);
        $this->view('templates/footer');
    }

    public function edit()
    {
        if( $this->model('Profile_model')->editData($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/profile  ');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/profile');
            exit;
        }

        // var_dump($_POST);
        // var_dump($_FILES['foto']['tmp_name']);
        // var_dump($_POST['address']);
    }
}
