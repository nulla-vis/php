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
//query insert/add data=====================================================================
function tambah($data) {
    global $conn;
    //ambil data dari tiap element dalam form-----------------------------------------------
    $nrp = htmlspecialchars($data["nrp"]);
    $nama =  htmlspecialchars($data["nama"]);
    $email =  htmlspecialchars($data["email"]);
    $jurusan =  htmlspecialchars($data["jurusan"]);

    //upload foto-------------------------------------------------------------------------
    $foto = upload();
    if( !$foto ) {
        return false; //jika suatu function ketemu false, bagian bawahnya ngak akan dijalankan
    }
    

    //query data untuk ditambahkan ke database
    $query = "INSERT INTO mahasiswa
        VALUES
        ('','$nama','$nrp','$email','$jurusan','$foto')
        ";
    
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

//query delete data=========================================================================
function hapus($id) {
    global $conn;
    mysqli_query($conn , "DELETE FROM mahasiswa WHERE id = $id");
    
    return mysqli_affected_rows($conn);
}

//query edit data===========================================================================
function ubah($data) {
    global $conn;
    //ambil data dari tiap element dalam form------------------------------------------------
    $id = $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $nama =  htmlspecialchars($data["nama"]);
    $email =  htmlspecialchars($data["email"]);
    $jurusan =  htmlspecialchars($data["jurusan"]);
    $fotoLama = htmlspecialchars($data["fotoLama"]);

    //check apakah user mencet tombol "choose file" untuk upload foto baru/tidak
    if($_FILES["foto"]["error"] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }

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

//query read(search) data===================================================================
function cari($keyword) {
    $jumlahDataPerhalaman = 3;
    //variabel query baru untuk search--------------------------------------------
    $query = " SELECT * FROM mahasiswa
        WHERE
        nama LIKE '%$keyword%' OR
        nrp LIKE '%$keyword%' OR
        email LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%'
    ";

    $jumlahData = count(query($query));
    $jumlahHalaman = ceil($jumlahData/$jumlahDataPerhalaman);
    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1 ;
    $awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

    $query = " SELECT * FROM mahasiswa
        WHERE
        nama LIKE '%$keyword%' OR
        nrp LIKE '%$keyword%' OR
        email LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%'
        LIMIT $awalData,$jumlahDataPerhalaman
    ";

    return [
        "query"=>query($query),
        "jumlahHalaman" => $jumlahHalaman,
        "halamanAktif" => $halamanAktif,
        "awalData" => $awalData,
        "cek" => $_GET["halaman"]
    ];
}

//upload picture============================================================================
function upload() {
    
    $namaFile =  $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    //cek apakah ada foto diupload / tidak

    if($error === 4) {
        echo "
        <script>
        alert('upload a picture first')
        </script>
        ";

        return false;
    }

    //cek apakah yang diupload file foto/bukan
    $ekstensiFotoValid = ["jpg","gif","png","jpeg"];
    $ekstensiFoto = explode(".",$namaFile); //return array
    $ekstensiFoto = strtolower(end($ekstensiFoto));

    if(!in_array($ekstensiFoto,$ekstensiFotoValid)) {
        echo "
        <script>
        alert('uploaded file not a picture')
        </script>
        ";
        return false;
    }

    //cek jika ukuran file terlalu besar
    if($ukuranFile > 3000000) {
        echo "
        <script>
        alert('uploaded file size too big')
        </script>
        ";
        return false ;
    }

    //lolos pengecheckan, foto siap diupload
    //generate nama baru untuk foto
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiFoto;
    // var_dump($namaFileBaru);die
    ;
    
    move_uploaded_file($tmpName,"img/".$namaFileBaru);

    return $namaFileBaru;
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"])); //hapus \ ama tolowercase
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);

    //check username yang dimasukkan udah ada di database/belum------------------
    $result = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('username sudah terdaftar!');
            </script>
        ";

        return false;
    }

    //konfirmasi password 1 dan 2------------------------------------------------
    if($password !== $password2) {
        echo "
            <script>
                alert('konfirmasi password tidak sesuai!');
            </script>
        ";
        return false;
    }
    //enkripsi password-----------------------------------------------------------
    $password = password_hash($password,PASSWORD_DEFAULT);
    // var_dump($password);die;
 
    //tambahkan userbaru ke database----------------------------------------------
    mysqli_query($conn,"INSERT INTO user 
    VALUES
        ('','$username','$password')
    ");
    
    return mysqli_affected_rows($conn);
}
function pagination(){
    //pagination---------------------------------------------------------------------------------------------------------------------
    $jumlahDataPerhalaman = 3;
    //algoritma $awalData
    //HALAMAN 1 = awaldata = 0
    //HALAMAN 2 = awaldata = 3
    //HALAMAN 3 = awaldata = 6
    //HALAMAN 4 = awaldata = 9

    //jumlah halaman = total data/data per halaman
    //jumlah halaman = 10/2 = 5 halaman
    // $result = mysqli_query($conn,"SELECT * FROM mahasiswa");
    // $jumlahData = mysqli_num_rows($result);

    $jumlahData = count(query("SELECT * FROM mahasiswa"));
    // var_dump($jumlahData);
    $jumlahHalaman = ceil($jumlahData/$jumlahDataPerhalaman); //pembulatan ke atas
    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1 ; //(condition) ?=if valueifTRUE : valueifFAlse
    $awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
    
    return [
        "query" =>query("SELECT * FROM mahasiswa LIMIT $awalData,$jumlahDataPerhalaman"), //LIMIT start index, banyak data yang mau ditunjukkan
        "jumlahHalaman" => $jumlahHalaman,
        "halamanAktif" => $halamanAktif,
        "awalData" => $awalData
    ];
}
?>