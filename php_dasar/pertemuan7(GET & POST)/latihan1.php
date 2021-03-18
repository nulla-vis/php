<?php 
//Variable Scope==============================================================
/*
$x = 10;


function showx() {
    // $x = 20;
    global $x;
    echo $x;
};

showx();
// echo "<br>";
// echo $x;
*/

//SUPERBLOBALS=================================================================
//variables that php already prepared
//all variables are Array Associative
// var_dump($_POST);
// var_dump($_GET);
// var_dump($_SERVER);
// echo $_SERVER["SERVER_NAME"];

//$_GET------------------------------------------------------------------------
// $_GET["nama"] = "Azhandi Usemahu";
// $_GET["nrp"] = "222012116";
// var_dump($_GET);
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
    <title>GET</title>
</head>
<body>
    <h1>Iphone List</h1>
    <ul>
        <?php foreach($smartphone as $smp) : ?>
            <li>
                <a href="latihan2.php?namaHp=<?= $smp["namaHp"]?>&release=<?= $smp["release"]?>&merk=<?= $smp["merk"]?>&harga=<?= $smp["harga"]?>&foto=<?= $smp["foto"]?>">
                    <?= $smp["namaHp"]; ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</body>
</html>