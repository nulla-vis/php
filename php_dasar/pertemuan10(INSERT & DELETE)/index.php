<?php 
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

//query data dari database=======================================================================================================
//pagination---------------------------------------------------------------------------------------------------------------------
if( empty($_SESSION["keyword"]) ) {
    $mahasiswa = pagination()["query"];
    $jumlahHalaman = pagination()["jumlahHalaman"];
    $halamanAktif = pagination()["halamanAktif"];
    $awalData = pagination()["awalData"];
} else {
    $hasil = cari($_SESSION["keyword"]);
    $mahasiswa = $hasil["query"];
    $jumlahHalaman = $hasil["jumlahHalaman"];
    $hasil2 = cari($_SESSION["keyword"]);
    $halamanAktif = $hasil2["halamanAktif"];
    $awalData = $hasil2["awalData"];
}


// var_dump($mahasiswa[0]);

//jika tombol cari diclick, data di variable $mahasiswa akan ditimpa sesuai keyword pencarian-------------------------------------
if( isset($_POST["cari"]) ) {
    $mahasiswa = cari($_POST["keyword"])["query"];
    $jumlahHalaman = cari($_POST["keyword"])["jumlahHalaman"];
    $_SESSION["keyword"] = $_POST["keyword"];
    $halamanAktif = cari($_SESSION["keyword"])["halamanAktif"];
    header("Location: ?halaman=1");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>

    <a href="logout.php">logout</a>

    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah data mahasiswa</a>
    <br><br>

    <form action="" method="post">
    <input type="text" name="keyword" size="40" autofocus placeholder="input search keyword" autocomplete="off">
    <button type="submit" name="cari">Cari</button>
    <br><br>
    <!-- jika ada data yang bisa ditampilkan=================================== -->
    <?php if(count($mahasiswa) > 0) : ?>
    <!-- navigasi pagination ===================================================-->
    <?php if($halamanAktif > 1) : ?>
        <a href="?halaman=<?= $halamanAktif-1; ?>">&laquo;</a>
    <?php endif; ?>

    <?php for($i=1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if($halamanAktif == $i) :?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
        <?php else :?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman=<?= $halamanAktif+1; ?>">&raquo;</a>
    <?php endif; ?>
    <!-- ======================================================================= -->
</form>
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
            <td><?= $i + $awalData; ?></td>
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

    <?php else : ?>
    <!-- jika tidak ada data yang bisa ditampilkan============================= -->
        <p style="color: red; font-style: italic;">data tidak ada / tidak ditemukan</p>
    <?php endif; ?>


</body>
</html>