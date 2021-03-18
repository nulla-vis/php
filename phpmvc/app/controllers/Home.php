<?php

class Home extends Controller { //controller bisa diakses karena yang mengakses file ini adalah app.php, dan yang mengakses app.php adalah index.php yang ada di public folder, dan didalamnya ada required_once init.php!
    public function index() {
        $data['judul'] = "Home"; //data untuk header, bisa juga masukin banyak dan dikirim ke semua halaman, kali ini di header saja
        $data['nama'] = $this->model('User_model')->getUser(); // model('User_model') = memamggil functionmodel dari controller, dan panggil method getUser();
        $this->view('templates/header', $data); //untuk mengambil template header
        $this->view('home/index',$data); //artinya memanggil file yang ada di folder view -> home -> nama filenya index.php
        //nama folder harus sesuai nama controller, dengan kata lain satu controller memiliki satu folder di views
        $this->view('templates/footer'); //untuk mengambil template footer
    }
}