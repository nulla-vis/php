<?php 
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
//check tombol submit sudah ditekan / belum-----------------------------------------------------
if( isset($_POST["submit"]) ) {
    // var_dump($_POST);
    // echo "<br>";
    // var_dump($_FILES);
    // die; 
    //cek apakah data berhasil ditambah ke database / tidak-------------------------------------
    if(tambah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan');
            document.location.href='index.php';
        </script>
        ";
    } else {
        echo "        
        <script>
            alert('data gagal ditambahkan');
            document.location.href='index.php';
        </script>
        ";
    };
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data Mahasiswa</title>
    <style>
        ul {
            list-style: none;
        }
        li {
            padding-top: 4px;
        }
        label {
            padding-right: 24px;
        }

    </style>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp" required>
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required>
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required> 
            </li>
            <li>
                <label for="foto">Foto : </label>
                <input type="file" name="foto" id="foto">
            </li>
            <li>
                <button type="submit" name="submit">Tambah data!</button>
            </li>
        </ul>
    </form>
</body>
</html>