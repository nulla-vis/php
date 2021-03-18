<?php 
//multidimensional array==============================================================
//array numeric-----------------------------------------------------------------------
//index with number starting from 0
$students = [
    ["Hanjani Ahmad", "222012115", "Teknik Sipil", "jani@test1.com"],
    ["Azhandi Usemahu", "222012116", "Teknik Sipil", "aan@test1.com"],
    ["Naufal Zaid", "222012117", "Teknik Sipil", "naufal@test117.com"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
</head>
<body>
    <h1>Students List</h1>
        <?php foreach($students as $student) : ?>
            <!-- ======================================= -->
            <!-- <ul> -->
            <?php 
            //foreach($student as $s) : ?>
                <!-- <li><?php //echo $s; ?></li> -->
            <?php //endforeach ?>
            <!-- </ul> -->
            <!-- ======================================= -->

            <ul>
              <li>Nama : <?= $student[0] ?></li>
              <li>NRP : <?= $student[1] ?></li>
              <li>Jurusan : <?= $student[2] ?></li>
              <li>Email : <?= $student[3] ?></li>
            </ul>
        <?php endforeach ?>
</body>
</html>