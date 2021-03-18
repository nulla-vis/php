<?php

class About extends Controller{

    public function index($nama = 'asdasd', $pekerjaan = 'zxczxc', $umur = 21) { //method default sesuai yang ada di property method pada class App
        $data = [
            "nama" => $nama,
            "pekerjaan" => $pekerjaan,
            "umur" => $umur,
            "judul" => "About me"
        ];
        // echo "Halo, saya $nama, saya seorang $pekerjaan";

        $this->view('templates/header', $data); //untuk mengambil template header
        $this->view('about/index', $data);//nama folder harus sesuai nama controller, dengan kata lain satu controller memiliki satu folder di views
        $this->view('templates/footer'); //untuk mengambil template footer
    }

    public function page() {
        // echo "about/page";
        $data['judul'] = "Pages";
        $this->view('templates/header', $data); //untuk mengambil template header
        $this->view('about/page'); //nama folder harus sesuai nama controller, dengan kata lain satu controller memiliki satu folder di views
        $this->view('templates/footer'); //untuk mengambil template footer
    }
}