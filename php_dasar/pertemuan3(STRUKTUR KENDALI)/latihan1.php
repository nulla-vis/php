<?php 
//Loop==================================================================
//1. for----------------------------------------------------------------
//for(initialization ; termination ; increment/decrement){}
// for($i = 0; $i < 5; $i++) {
//     echo "Hello World! <br>";
// }

//2. while--------------------------------------------------------------
/*
initialization
while(termination){
increment/devrement
}

$i = 0;
while($i<5) {
    echo "Hello World <br>";
    $i++;
};
*/
//3. do.. while---------------------------------------------------------
/*
initialization
do{
 code
 increment/decrement
} while (termination)

$i = 10;
do {
    echo "Hello World! <br>";
    $i--;
} while($i < 5);
*/
//4. foreach (special for array)----------------------------------------


//Exercise==============================================================
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 1</title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <!-- <tr>
            <td>1,1</td>
            <td>1,2</td>
            <td>1,3</td>
            <td>1,4</td>
            <td>1,5</td>
        </tr>
        <tr>
            <td>2,1</td>
            <td>2,2</td>
            <td>2,3</td>
            <td>2,4</td>
            <td>2,5</td>
        </tr> -->
        <?php 
            // for($i = 1; $i <= 3; $i++){
            //     echo "<tr>";
            //     for($j = 1; $j <=5; $j++) {
            //         echo "<td>$i,$j</td>";
            //     }
            //     echo "</tr>";
            // }
        ?>
        <!-- templating -->
        <?php for($i = 1; $i <= 3; $i++ ) :?>
            <tr>
                <?php for($j = 1; $j <= 5; $j++) : ?>
                    <td><?= "$i,$j"; ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>
</html>