<?php 
//connect to database

$conn = mysqli_connect('localhost','root','','ajaxtest');


echo 'Processing. . .';

// Check for GET variables

if(isset($_GET['name'])) {
    echo 'GET: Your name is '. $_GET['name'];
}

// Check for POST variables
if(isset($_POST['name'])) {
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    echo 'GET: Your name is '. $_POST['name'];

    $query = "INSERT INTO users(name) VALUES('$name')";
    

if(mysqli_query($conn, $query)) {
    echo ' User Added. . .';
} else {
    echo 'ERROR: '. mysqli_error(($conn));
}
}
?>