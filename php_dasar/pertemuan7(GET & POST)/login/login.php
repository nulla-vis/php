<?php 
//if submit button already pressed/nope
if( isset($_POST["submit"]) ) {
    //check username and password
    if($_POST["username"] === "admin" && $_POST["password"] === "123") {
    //if usename and password are correct, redirect to admin.php
        header("Location: admin.php");
        exit;
    }else {
    //if incorrect, show the error
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        ul {
            list-style: none;
        }
        p {
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Login Admin</h1>
    <?php if(isset($error)) : ?>
    <p>Username/Password is INCORRECTED</p>
    <?php endif ?>

    <ul>
    <form action="" method="post">
        <li>
            <label for="username">username : </label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password">password : </label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <button type="submit" name="submit">login</button>
        </li>
    </form>
    </ul>
</body>
</html>