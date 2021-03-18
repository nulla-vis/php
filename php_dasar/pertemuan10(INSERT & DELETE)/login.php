<?php 
session_start();
require 'functions.php';
// check cookie------------------------------------------------------------------------------------
if(isset($_COOKIE["wkwk"]) && isset($_COOKIE["wkwk2"])) {
    $id = $_COOKIE["wkwk"];
    $key = $_COOKIE["wkwk2"];

    //ambil username berdasarkan id;
    $result = mysqli_query($conn , "SELECT username FROM user where id = $id");
    $row = mysqli_fetch_assoc($result);

    //check cookie dan username
    if ($key === hash("sha256",$row["username"])) {
        $_SESSION["login"] = true;
    }
}

//check session-------------------------------------------------------------------------------------
if(isset($_SESSION["login"])) {
    header("Location: index.php");
}

if(isset($_POST["login"])) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn , "SELECT * FROM user WHERE username = '$username'");
    // var_dump(mysqli_num_rows($result));die;
    //check username ada/tidak
    if(mysqli_num_rows($result) === 1) {
        //check password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {
            //set session agar user harus login sebelum melihat halaman lain
            $_SESSION["login"] = true;

            //remember me di check/tidak
            if(isset($_POST["remember"])) {
                //buat cookie
                setcookie("wkwk",$row["id"],time()+60); //id
                setcookie("wkwk2",hash("sha256",$row["username"]),time()+60); //key
            }

            header("Location: index.php");
            exit;
        };
    }

    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        ul {
            list-style: none;
        }
    </style>
</head>
<body>
    <h1>Halaman Login</h1>

    <?php if(isset($error)) : ?>
        <p style="color: red; font-style: italic;">username/password salah</p>
    <?php endif; ?>

    <form action="" method="POST">

        <ul>
            <li>
                <label for="username">username : </label>
                <input type="text" name="username" id="username" required autocomplete="off">
            </li>
            <li>
                <label for="password">password : </label>
                <input type="password" name="password" id="password" required autocomplete="off">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember" autocomplete="off">
                <label for="remember">remember me</label>
            </li>
            <li>
                <button type="submit" name="login">login</button>
            </li>

        </ul>

    </form>
</body>
</html>