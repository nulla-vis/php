<?php 
//Array======================================================================
//variable that can contains many value
//array's element can be different type of value
//array is a pair of key (the index) and value
//index of an array start from 0
//declaring array------------------------------------------------------------
//1.old way
$day = array("Monday","Tuesday","Wednesday","Thursday","Friday");

//2. new way
$month = ["Jan", "Feb", "Mar", "Apr", "Mei"];

$arr1 = [
    [123,"string",true],
    [222,"sometext",false]
];

//adding new element to an exsting array-------------------------------------
var_dump($arr1);
echo "<br>";
// $day[]="Saturday";
$arr1[]=[3433,"is this work?",false];
var_dump($arr1);


//output the array------------------------------------------------------------
// var_dump($arr1);
// echo $arr1[1][0];
// print_r($day);

?>