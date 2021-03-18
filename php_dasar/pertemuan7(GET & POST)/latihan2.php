<?php 
//check if there's data in $_GET----------------------------------------------------------------------------
if( !isset( $_GET["namaHp"]) || 
    !isset( $_GET["release"]) || 
    !isset( $_GET["foto"]) ||
    !isset( $_GET["harga"]) ||
    !isset( $_GET["merk"]) ) {
    //redirect
    header("Location: latihan1.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iphone Detail</title>
</head>
<body>
    <ul>
        <li><img src="img/<?= $_GET["foto"]; ?>" alt=""></li>
        <li><?= $_GET["namaHp"]; ?></li>
        <li><?= $_GET["release"]; ?></li>
        <li><?= $_GET["merk"]; ?></li>
        <li><?= $_GET["harga"]; ?></li>
    </ul>

    <a href="latihan1.php">Back to Iphone List</a>
</body>
</html>