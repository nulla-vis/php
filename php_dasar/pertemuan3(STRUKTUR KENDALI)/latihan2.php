<?php 
//conditional branching=============================================
//1. if else--------------------------------------------------------
// $x = 10;
// if($x < 20) {
//     echo "true";
// }else {
//     echo "false";
// }; 
//2. if else if else------------------------------------------------
// $x = 2;
// if($x < 20) {
//     echo "true";
// }else if ($x == 20){
//     echo "exactly 20";
// }else {
//     echo "false";  
// }
//3. ternary (if else simplified)-----------------------------------
//switch(when too much if else)-------------------------------------

//EXERCISE==========================================================
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 1</title>
    <style>
        .row-color {
            background-color: silver;
        }
    </style>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <!-- templating -->
        <?php for($i = 1; $i <= 5; $i++ ) : ?>
            <?php if($i % 2 == 1) : ?>
            <tr class="row-color">
            <?php else : ?>
            <tr>
            <?php endif; ?>
                <?php for($j = 1; $j <= 5; $j++) : ?>
                    <td><?= "$i,$j"; ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>
</html>