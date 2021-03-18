<?php

class mahasiswa_model {
    // private $mhs = [ //data ini bisa didapat dari query ke data base / api
    //     [
    //     "nama" => "Sandhika Galih",
    //     "nrp" => "043040023",
    //     "email" => "sandhikagalih@unpas.ac.id",
    //     "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //     "nama" => "Doddy Ferdiansyah",
    //     "nrp" => "133050321",
    //     "email" => "doddyferdiansyah@gmail.com",
    //     "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //     "nama" => "Erik Doank",
    //     "nrp" => "163030123",
    //     "email" => "erik@yahoo.com",
    //     "jurusan" => "Teknik Industri"
    //     ]
    // ];

    private $table = 'mahasiswa',
            $db;

    public function __construct() {
        $this->db = new Database;// instansiasi Database class dan jalankan database
    }

    public function getAllMahasiswa() {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id) {
        $this->db->query("SELECT * FROM {$this->table} WHERE id=:id"); // id=:id = menyimpan data yang akan di binding, untuk menghindari dql injection, dan mengamankan query kita
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data) {
        $query = "INSERT INTO {$this->table}
            VALUES
            ('', :nama, :nrp, :email, :jurusan)";
        $this->db->query($query);
        
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount(); //jika baris pada database sukses berubah = 1, jika gagal = 0
    }

    public function hapusDataMahasiswa($id) {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount(); //jika baris pada database sukses berubah sukses = 1, jika gagal = 0
    }

    public function ubahDataMahasiswa($data) {
        $query = "UPDATE mahasiswa SET nama = :nama, nrp =:nrp, email = :email, jurusan = :jurusan WHERE id = :id";
        $this->db->query($query);
        
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute2($data);

        return $this->db->rowCount(); //jika baris pada database sukses berubah = 1, jika gagal = 0
    }

    public function cariDataMahasiswa() {
        $keyword = $_POST['keyword'];
        $query = "SELECT * from {$this->table} WHERE
        nama LIKE :keyword OR
        nrp LIKE :keyword OR
        email LIKE :keyword OR
        jurusan LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword',"%$keyword%");
        return $this->db->resultSet();
    }

    

 
}