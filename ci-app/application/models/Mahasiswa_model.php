<?php

class Mahasiswa_model extends CI_Model {
    public function getAllMahasiswa()
    {
        return $this->db->get('mahasiswa')->result_array(); //code igniter query builder, generating array result, otomatis nmengembalikan semua data yang ada di tabel 'mahasiswa' dalam bentuk array
        
    }

    public function tambahDataMahasiswa() {
        $data = [
            "nama"=>$this->input->post('nama', true), //true itu untuk filter character kalau mau masuk ke data base, kalau tidak masuk ke database, boleh pakai / tidak
            "nrp"=>$this->input->post('nrp', true),
            "email"=>$this->input->post('email', true),
            "jurusan"=>$this->input->post('jurusan', true)
        ];

        $this->db->insert('mahasiswa', $data);
    }

    public function hapusDataMahasiswa($id) {
        // $this->db->where('id', $id);
        // $this->db->delete('mahasiswa');
        // CARA 2
        $this->db->delete('mahasiswa', ['id' => $id]);
    }

    public function getMahasiswaById($id) {
       return $this->db->get_where('mahasiswa', array('id' => $id))->row_array(); //mirip dengan cara 2 hapus data
    }

    public function ubahDataMahasiswa() {
        $data = [
            "nama"=>$this->input->post('nama', true), //true itu untuk filter character kalau mau masuk ke data base, kalau tidak masuk ke database, boleh pakai / tidak
            "nrp"=>$this->input->post('nrp', true),
            "email"=>$this->input->post('email', true),
            "jurusan"=>$this->input->post('jurusan', true)
        ];

        $this->db->where('id',$this->input->post('id', true))->update('mahasiswa', $data);
    }

    public function cariDataMahasiswa() {
        $keyword = $this->input->post('keyword', true); //true itu untuk filter character kalau mau masuk ke data base, kalau tidak masuk ke database, boleh pakai / tidak
        $this->db->like('nama', $keyword);
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('jurusan', $keyword);

        return $this->db->get('mahasiswa')->result_array();
    }
}