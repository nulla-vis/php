<?php 
//Array Numeric (Review)================================================================
// $mahasiswa = [
//     ["Hanjani Ahmad", "222012115", "Teknik Sipil", "jani@test1.com"],
//     ["Azhandi Usemahu", "222012116", "Teknik Sipil", "aan@test1.com"],
//     ["Naufal Zaid", "222012117", "Teknik Sipil", "naufal@test117.com"]
// ];

//Assisiative Array=====================================================================
// key is the string we decided
$smartphone = [
    [
        "namaHp" => "Iphone 11",
        "release" => "20 September 2019",
        "merk" => "Apple",
        "harga" => "15,7 Juta",
        "foto" => "iphone 11.jpg"
    ],
    [
        "namaHp" => "Iphone X",
        "release" => "3 November 2017",
        "merk" => "Apple",
        "harga" => "13,4 Juta",
        "foto" => "iphone X.jpg"
    ],
    [
        "namaHp" => "Iphone 8",
        "release" => "22 September 2017",
        "merk" => "apple",
        "harga" => "4,2 Juta",
        "foto" => "iphone 8.jpg"
    ],
    [
        "namaHp" => "Iphone 7",
        "release" => "16 September 2016",
        "merk" => "apple",
        "harga" => "15,7 Juta",
        "foto" => "iphone 7.jpg"
    ]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Smartphone</title>
    <style>
        .li1 {
            list-style: none;
        }
    </style>
</head>
<body>
    <h1>Daftar Smartphone</h1>
    <?php foreach ($smartphone as $smp) : ?>
    <ul>
        <li class="li1">
            <img src="img/<?= $smp['foto']; ?>" alt="">
        </li>
        <li>Jenis Hp : <?= $smp["namaHp"] ?></li>
        <li>Tanggal peluncuran : <?= $smp["release"] ?></li>
        <li>Merk : <?= $smp["merk"] ?></li>
        <li>Harga : <?= $smp["harga"] ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>