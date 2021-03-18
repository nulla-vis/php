<?php 

require 'functions.php';

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
                <button type="submit" name="login">login</button>
            </li>

        </ul>

    </form>
</body>
</html>