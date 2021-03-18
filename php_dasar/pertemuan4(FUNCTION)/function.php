<?php 
//user-defined function=======================================================

function greet($time = "Day",$name = "User") {
    $currentTime = strtotime("now")+(5*3600);
    $morning = mktime(0,0,0,date("n"),date("j"),date("y"))+(5*3600);
    // echo(date("g:i:s a",$currentTime))."<br>";
    $afternoon = mktime(0,0,0,date("n"),date("j"),date("y"))+(12*3600);
    $evening = mktime(0,0,0,date("n"),date("j"),date("y"))+(17*3600);
    $night = mktime(0,0,0,date("n"),date("j"),date("y"))+(19*3600);
    // echo(date("g:i:s a",$night))."<br>";
    if($currentTime >= $night){
        $time = "Night";
    }else if ($currentTime >= $evening) {
        $time = "Evening";
    }else if($currentTime >= $afternoon) {
        $time = "Afternoon";
    }else {
        $time = "Morning";
    };
    return "Good $time, $name";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>function exercise</title>
</head>
<body>
    <h1><?= greet("night","Azhandi"); ?></h1>
</body>
</html>