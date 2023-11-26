<?php


class tableData extends Controller {
    public function index() {
        session_start();
        
        if (!isset($_SESSION['email'])) {
            header('Location: home'); 
            exit();
        }
        $data['judul'] = 'Data Siswa';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['siswa'] = $this->model('Siswa_model')->getSiswa();
        $this->view('templates/header', $data);
        $this->view('tableData/index', $data);
        $this->view('templates/footer');
    }
}

?>