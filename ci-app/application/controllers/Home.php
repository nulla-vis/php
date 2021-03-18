<?php

class Home extends CI_Controller {
    public function index($nama = 'Azhandi Usemahu') 
    {   
        $data['judul'] = 'Halaman Home';
        $data['nama'] = $nama;
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data); //artinya mau jalankan file yang namanya Home.php di folder views (parameter paling kanan/ujung = nama file, method dan parameter lainnya = nama folder) disini index = index.php, home & views = nama folder
        $this->load->view('templates/footer');
    }
}