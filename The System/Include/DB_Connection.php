<?php

//Create Connection With DataBase

$Server_Name = "localhost";
$User_Name = "root";
$User_Password = "";
$DataBase_Name = "the_system";

$DB_Connect = mysqli_connect($Server_Name, $User_Name, $User_Password, $DataBase_Name);

if(!$DB_Connect)
{
    die("Sorry! Database Connection Fail".mysqli_connect_error());
}

//---------------------------------------------------------------------------------------------------------------------------

?>