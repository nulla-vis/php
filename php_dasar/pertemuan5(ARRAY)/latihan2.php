<?php 
//loop for array output
//for / foreach
$numbers = [1,2,3,45,1,3123,54,12,8];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
    <style>
        .square {
            width: 50px;
            height: 50px;
            background-color: salmon;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
        }
        .clear {
            clear: both;
        }
    </style>
</head>
<body>
    <!-- using for loop -->
    <?php for($i = 0 ; $i < count($numbers); $i++) : ?>
        <div class="square"><?= $numbers[$i] ?></div>
    <?php endfor; ?>

    <div class="clear"></div>
    
    <!-- using foreach loop -->
    <?php foreach($numbers as $number) : ?>
        <div class="square"><?= $number ?></div>
    <?php endforeach; ?>
</body>
</html>