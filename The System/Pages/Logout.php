<?php
session_start();
include_once("../Include/DB_Connection.php");

    $user = $_SESSION['email'];
    $select = "SELECT * FROM users WHERE email='$user'";
    $q1 = mysqli_query($DB_Connect, $select);
    $row = mysqli_fetch_array($q1);

    $user_id = $row['user_id'];
    $email = $row['email'];

    $update = "UPDATE users SET status='Offline' WHERE email='$email'";
    $q = mysqli_query($DB_Connect, $update);
    
session_unset();
session_destroy();
header("location: ../Index.php");
exit();
?>