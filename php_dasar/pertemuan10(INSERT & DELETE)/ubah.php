<?php 
require 'functions.php';

//take id from URL------------------------------------------------------------------------------
$id = $_GET["id"];

//query data mahasiswa berdasarkan $id----------------------------------------------------------
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
// var_dump($mhs);

//check tombol submit sudah ditekan / belum-----------------------------------------------------
if( isset($_POST["submit"]) ) {
    // var_dump($_POST);
    //cek apakah data berhasil diubah ke database / tidak
    if(ubah($_POST) > 0) {
        
        echo "
        <script>
            alert('data berhasil diubah');
            document.location.href='index.php';
        </script>
        ";
    } else {
        echo "        
        <script>
            alert('data gagal diubah');
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
    <title>Ubah data Mahasiswa</title>
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
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <input type="hidden" name="fotoLama" value="<?= $mhs["foto"]; ?>">
        <ul>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"] ?>">
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"] ?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required value="<?= $mhs["email"] ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"] ?>"> 
            </li>
            <li>
                <label for="foto">Foto : </label><br>
                <img src="img/<?= $mhs['foto'] ?>" width="50" alt=""><br>
                <input type="file" name="foto" id="foto">
            </li>
            <li>
                <button type="submit" name="submit">Ubah data!</button>
            </li>
        </ul>
    </form>
</body>
</html>