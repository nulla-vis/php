<?php 
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

//query data dari database--------------------------------------------------------------------------------------------------------
$mahasiswa = query("SELECT * FROM mahasiswa");
// var_dump($mahasiswa[0]);

//jika tombol cari diclick, data di variable $mahasiswa akan ditimpa sesuai keyword pencatian-------------------------------------
if( isset($_POST["cari"]) ) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        .loader {
            width: 100px;
            position: absolute;
            top: 116px;
            z-index: -1;
            left: 270px;
            display: none;
        }
    </style>
    <script src="js/jquery-3.5.1.min.js"></script> 
    <script src="js/script1.js"></script>
</head>
<body>

    <a href="logout.php">logout</a>

    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah data mahasiswa</a>
    <br><br>
<!-- form pencarian====================================================================================================== -->

    <form action="" method="post">
        <input type="text" name="keyword" size="40" placeholder="input search keyword" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>

        <img src="img/loader2.gif" class="loader">

<!-- ==================================================================================================================== -->
    </form>

    <br><br>

    <div id="container">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Foto</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $row) :?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?')">hapus</a>
                </td>
                <td><img src="img/<?= $row["foto"] ?>" width="50" alt=""></td>
                <td><?= $row["nrp"] ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["jurusan"] ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach ?>
        </table>
    </div>

</body>
</html>