<?php

class Mahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct(); //wajib di tulis (construct untuk parentnya)
        // $this->load->database(); //untuk database, atau bisa diedit di config/autoload dan config/database
        $this->load->model('Mahasiswa_model'); //load dulu sebelum modelnya dipanggil
        $this->load->library('form_validation');

        
    }

    public function index()
    {   
        // $this->load->model('Mahasiswa_model');
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa(); //memanggil model (harus setelah di load di atas)
        if($this->input->post('keyword')) {
            $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data); //artinya mau jalankan file yang namanya Home.php di folder views (parameter paling kanan/ujung = nama file, method dan parameter lainnya = nama folder) disini index = index.php, home & views = nama folder
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // $this->load->library(array('form_validation'));
        // $this->load->helper(array('form', 'url'));

        $data['judul'] = 'Tambah Data Mahasiswa';
        // $data['jurusan'] = [$this->Jurusan_model->getAlljurusan()]; //harusnya ada table jurusan lagi di database
        $data['jurusan'] = ['Teknik Informatika', 'Teknik Sipi', 'Teknik Mesin', 'Teknik Industri', 'Teknik Planologi'];

        // set message untuk error
        $this->form_validation->set_message('required','Field {field} tidak boleh kosong');
        $this->form_validation->set_message('valid_email','Field {field} harus berisi email yang valid');
        $this->form_validation->set_message('numeric','Field {field} harus diisi dengan angka NRP');

        // rules untuk form validation
        $this->form_validation->set_rules('nama', 'Name', 'required'); //parameternya (name, alias name/yg ditampilkan pas error, rulesnya ) , name pada attibute di form
        $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/tambah', $data); //artinya mau jalankan file yang namanya Home.php di folder views (parameter paling kanan/ujung = nama file, method dan parameter lainnya = nama folder) disini index = index.php, home & views = nama folder
            $this->load->view('templates/footer');
        } else {
            $this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan'); //parameternya (nama_session, isi_session/pesan)
            redirect('mahasiswa'); //redirect cukup masukkin nama controllernya aja mau ke mana, kalau mahasiswa otomatis ke index
        }
    }

    public function hapus($id) //$id diambil dari url, karena kalau check di views-nya passing id pas di link
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa');
    }

    public function detil($id) {
        $data['judul'] = 'Detil Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/detil', $data); //artinya mau jalankan file yang namanya Home.php di folder views (parameter paling kanan/ujung = nama file, method dan parameter lainnya = nama folder) disini index = index.php, home & views = nama folder
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {

        $data['judul'] = 'Tambah Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        // $data['jurusan'] = [$this->Jurusan_model->getAlljurusan()]; //harusnya ada table jurusan lagi di database
        $data['jurusan'] = ['Teknik Informatika', 'Teknik Sipi', 'Teknik Mesin', 'Teknik Industri', 'Teknik Planologi'];

        $this->form_validation->set_message('required','Field {field} tidak boleh kosong');
        $this->form_validation->set_message('valid_email','Field {field} harus berisi email yang valid');
        $this->form_validation->set_message('numeric','Field {field} harus diisi dengan angka NRP');

        $this->form_validation->set_rules('nama', 'Name', 'required'); //parameternya (name, alias name/yg ditampilkan pas error, rulesnya ) , name pada attibute di form
        $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/ubah', $data); 
            $this->load->view('templates/footer');
        } else {
            $this->Mahasiswa_model->ubahDataMahasiswa($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('mahasiswa');
        }
    }
    
}