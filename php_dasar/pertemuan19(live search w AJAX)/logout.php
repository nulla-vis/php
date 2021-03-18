<?php 
session_start();
//delete session datas
$_SESSION = [];
session_unset();
session_destroy();

setcookie("wkwk","",time()-3600);
setcookie("wkwk2","",time()-3600);

header("Location: login.php");
?>