<?php 
session_start();
//delete session datas
$_SESSION = [];
session_unset();
session_destroy();

header("Location: login.php");
?>