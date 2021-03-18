<?php

class Peoples extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'List of Peoples';

        $this->load->model('Peoples_model', 'peoples'); //load modelnya dulu sebelum digunakan
        // $data['peoples'] = $this->peoples->getAllPeoples();

        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // Pagination------------------------------------------------------------------
        // 1. load (bisa pakai autoload)
        $this->load->library('pagination');

        // 2. Config
        // sebaian data config, buat file pagination.php di config folder lalu masukkan di sana, otomatis terpanggil
        // $config['total_rows'] = $this->peoples->countAllPeoples(); //total data pada table
        $this->db->like('name', $data['keyword']);
        $this->db->or_like('address', $data['keyword']);
        $this->db->or_like('email', $data['keyword']);
        $this->db->from('peoples');
        $config['total_rows'] = $this->db->count_all_results(); //akan menghitung brapa baris yang dikembalikan pada query terakhir
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 8; //berapa data per halaman

        // 4. Initialize
        $this->pagination->initialize($config);

        // 5. Cetak pagination di viewnya       
        // End of Pagination------------------------------------------------------------

        $data['start'] = $this->uri->segment(3);
        $data['peoples'] = $this->peoples->getPeoples($config['per_page'], $data['start'], $data['keyword']); //parameter (brapa data yang tampil, mau mulai dari data yang mana/ke-berapa, data keyword untuk pencarian) -> yang tampil 12 data, 30 berarti akan dimulai dari data yang ke 31, keyword dari data['keyword] di atas

        $this->load->view('templates/header', $data);
        $this->load->view('peoples/index', $data); //artinya mau jalankan file yang namanya Home.php di folder views (parameter paling kanan/ujung = nama file, method dan parameter lainnya = nama folder) disini index = index.php, home & views = nama folder
        $this->load->view('templates/footer');
    }
}
