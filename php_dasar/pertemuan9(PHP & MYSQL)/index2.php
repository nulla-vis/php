<?php 
//koneksi ke database==============================================================================
// mysqli_connect("namahost","username","password","namadatabase");
$conn = mysqli_connect("localhost","root","","phpdasar");


//ambil data dari table mahasiswa (query)==========================================================
// mysqli_query(namakoneksi,"syntax query");
$result = mysqli_query($conn,"SELECT * FROM mahasiswa");
// var_dump($result);
/*
if( !$result ) {
    echo mysqli_error($conn);
}
*/

//ambil data dari object $result (fetch)===========================================================

//1. mysqli_fetch_row()----------------------------------------------------------------------------
//return array numeric
// $mahasiswa = mysqli_fetch_row($result);
// var_dump($mahasiswa[2]);

//2. mysqli_fetch_assoc()--------------------------------------------------------------------------
//return array association -> RECOMMNDED
// $mahasiswa = mysqli_fetch_assoc($result);
// var_dump($mahasiswa["jurusan"]);
// while( $mahasiswa = mysqli_fetch_assoc($result) ) {
//     var_dump($mahasiswa["nama"]);
// }

//3. mysqli_fetch_array()---------------------------------------------------------------------------
//return array that can be both numeric and association
// $mahasiswa = mysqli_fetch_array($result);
// var_dump($mahasiswa["nrp"]);
// var_dump($mahasiswa["2"]);



//4. mysqli_fetch_object()--------------------------------------------------------------------------
//return object
// $mahasiswa = mysqli_fetch_object($result);
// var_dump($mahasiswa->email);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php $i = 1; ?>
        <?php while($row = mysqli_fetch_assoc($result)) :?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="">ubah</a> |
                <a href="">hapus</a>
            </td>
            <td><img src="img/<?= $row["foto"] ?>" width="50" alt=""></td>
            <td><?= $row["nrp"] ?></td>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["jurusan"] ?></td>
        </tr>
        <?php $i++; ?>
        <?php endwhile ?>
    </table>
</body>
</html>