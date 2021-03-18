<?php
$conn = mysqli_connect("localhost","root","","phpdasar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
//query insert data-------------------------------------------------------------------------
function tambah($data) {
    global $conn;
    //ambil data dari tiap element dalam form-----------------------------------------------
    $nrp = htmlspecialchars($data["nrp"]);
    $nama =  htmlspecialchars($data["nama"]);
    $email =  htmlspecialchars($data["email"]);
    $jurusan =  htmlspecialchars($data["jurusan"]);
    $foto =   htmlspecialchars($data["foto"]);

    //query data untuk ditambahkan ke database
    $query = "INSERT INTO mahasiswa
        VALUES
        ('','$nama','$nrp','$email','$jurusan','$foto')
        ";
    
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn , "DELETE FROM mahasiswa WHERE id = $id");
    
    return mysqli_affected_rows($conn);
}

function ubah($data,$id) {
    global $conn;
    //ambil data dari tiap element dalam form-----------------------------------------------
    // $id = $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $nama =  htmlspecialchars($data["nama"]);
    $email =  htmlspecialchars($data["email"]);
    $jurusan =  htmlspecialchars($data["jurusan"]);
    $foto =   htmlspecialchars($data["foto"]);

    $query = "UPDATE mahasiswa SET
        nrp = '$nrp',
        nama = '$nama',
        email = '$email',
        jurusan = '$jurusan',
        foto = '$foto'
        WHERE id = $id
    ";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    global $conn;
    //variabel query baru untuk search--------------------------------------------
    $query = " SELECT * FROM mahasiswa
        WHERE
        nama LIKE '%$keyword%' OR
        nrp LIKE '%$keyword%' OR
        email LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%'
    ";
    
    return query($query);
}
?>