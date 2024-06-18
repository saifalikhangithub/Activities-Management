<?php
session_start();

include_once("../Include/DB_Connection.php");

	if (isset($_POST['submit'])) {

			$e = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['email']));
		$email = strtolower($e);
		$password = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['password']));

		$select = "SELECT * FROM users WHERE email='$email'";
		$q= mysqli_query($DB_Connect, $select);
		$check = mysqli_num_rows($q);
		if($check == 1)
		{
			while($row=mysqli_fetch_assoc($q))
			{
				if(password_verify($password, $row['password']))
				{
					$_SESSION['email'] = $email;
					echo "<script>window.open('../Pages/Home.php', '_self')</script>";
					$update = "UPDATE users SET status='Online', last_login=NOW() WHERE email='$email'";
					$q = mysqli_query($DB_Connect, $update);
				}
				else
				{
					echo"<script>alert('Your Email or Password is Incorrect')</script>";
					echo "<script>window.open('Login_f.php', '_self')</script>";
				}
			}
		}
        else
        {
            echo"<script>alert('Your Record Not Exist')</script>";
        }
	}
?>