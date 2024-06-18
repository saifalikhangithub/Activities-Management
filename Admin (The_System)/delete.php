<?php

include_once("DB_Connection.php");

//---------------------------------------------------------------------------------------------------------------------------

if(isset($_GET['delete_id']))
{
    $id=$_GET['delete_id'];

    $delete = "DELETE FROM users WHERE user_id='$id'";
    $query = mysqli_query($DB_connect, $delete);
    if($query)
    {
        echo "<script>alert('Record Deleted Successfully.')</script>";
        echo "<script>window.open('database.php', '_self')</script>";
    }
    else
    {
        echo "<script>alert('Error')</script>";
        echo "<script>window.open('database.php', '_self')</script>";
    }
}

?>