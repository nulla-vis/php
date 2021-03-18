
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>
<body>
<?php if( isset($_POST["submit"])) : ?>
    <h1>Hallo!, Welcome <?= $_POST["namaHp"]; ?></h1>
<?php endif ?>
    <form action="" method="post">
        Input Smartphone Name
        <input type="text" name="namaHp">
        <br>
        <button type="submit" name="submit">Check</button>
    </form>
</body>
</html>