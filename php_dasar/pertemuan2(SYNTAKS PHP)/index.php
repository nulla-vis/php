<?php
// Basic php Syntax ============================================================================

//output standard===============================================================================
//1. echo---------------------------------------------------------------------------------------
// echo "Azhandi Usemahu";
// echo 123;
// echo true;

//2.print----------------------------------------------------------------------------------------
// print "Azhandi Usemahu";

//3.print_r (for array) -> for debugging---------------------------------------------------------
// print_r("Azhandi Usemahu"); 

//4.var_dump (for variable information) -> for debugging-----------------------------------------
// var_dump("Azhandi Usemahu");


//how to write php syntax========================================================================
//1. php inside HTML-----------------------------------------------------------------------------

//2. variable and data type----------------------------------------------------------------------
$namaDepan = "Azhandi";
$namaBelakang = "Usemahu";

//3.Operator-------------------------------------------------------------------------------------
//a.arithmatics
//+ - * / %
// $x = 10;
// $y = 20;
// echo $x * $y;

//b. string concatenation
// $namaDepan = "Azhandi";
// $namaBelakang = "Usemahu";
// echo $namaDepan. " " . $namaBelakang;

//c. Assigment
// =, +=, -=, *=, /=, %=, .=
// $z = 1;
// $z -=5;
// echo $z;
// $name = "Azhandi";
// $name.= " ";
// $name.= "Usemahu";
// echo $name;''

//d. Compare
//<, >, <=, >=, == , != this operator didnt chect data type
// var_dump(1 == "1");

//e. Identity
// ===, !== , with this, data type will also will be checked
// var_dump(1 !== "1");

//Logic
//&&, ||, !
// $c = 30;
// var_dump($c < 20 || $c%2 == 0);


?>

<!-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <h1>hello and welcome <?php //echo $namaDepan. " " .$namaBelakang; //this is php tag inside html (recommneded)?> </h1>
    <?php //echo "<h1>$namaDepan $namaBelakang</h1>"; //html tag inside php(not recommended) ?>
</body>
</html>  -->









