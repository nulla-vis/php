<?php
//buitl-in function======================================================
//1. date----------------------------------------------------------------
// echo date("l, d-M-y");

//2. time----------------------------------------------------------------
//UNIX Timestamp / EPOCH time
//how many seconds have passed since 1 January 1970
// echo time();

//3. mktime--------------------------------------------------------------
//echo mktime(jam,menit,detik,bulan,tanggal,tahun)
// echo mktime(0,0,0,date("n"),date("j"),date("y"))+(5*3600);
// echo mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("y"));

//4. strtitime
// echo strtotime("19 nov 1994");
// echo strtotime("now");

//exrcise=================================================================
// echo date("l, d-M,y", time()+(3600*24*100));
//what day you were born
// echo date("l. d-M-y", mktime(0,0,0,11,19,1994));
// echo date("l. d-M-y", strtotime("19 nov 1994"));

$currentTime = strtotime("now")+(5*3600);
$morning = mktime(0,0,0,date("n"),date("j"),date("y"))+(5*3600);
$afternoon = mktime(0,0,0,date("n"),date("j"),date("y"))+(12*3600);
$evening = mktime(0,0,0,date("n"),date("j"),date("y"))+(17*3600);
$night = mktime(0,0,0,date("n"),date("j"),date("y"))+(19*3600);
echo(date("g:i:s a",$currentTime))."<br>";
if($currentTime >= $afternoon) {
    echo "true <br>";
    echo $currentTime."<br>";
    echo $afternoon;
    echo(date(" g:i:s a",$afternoon));
}else {
    echo "false <br>";
    echo $currentTime."<br>";
    echo $afternoon;
}
?>