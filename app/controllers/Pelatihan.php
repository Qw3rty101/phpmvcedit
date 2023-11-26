<?php 

class Pelatihan extends Controller {
    public function index()
    {
        $data['judul'] = 'Pelatihan';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('pelatihan/index', $data);
        $this->view('templates/footer');
    }
}