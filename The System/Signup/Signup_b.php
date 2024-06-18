<?php

include_once("../Include/DB_Connection.php");

if(isset($_POST['submit']))
{
    $first_name = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['first_name']));
    $last_name = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['last_name']));
        $e = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['email']));
    $email = strtolower($e);

        $unk_num = sprintf('%d', rand(1111, 9999));
	    $unk_name = $first_name . $last_name . $unk_num;
        $u_name = str_replace(' ', '', $unk_name);
    $username = strtolower($u_name);

    $password = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['password']));
    $c_password = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['c_password']));
    $mobile_number = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['mobile_number']));
    $dob = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['dob']));
    $country = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['country']));
    $gender = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['gender']));
    $post = "No";
    $likes="";
    $the_like = $_POST['like'];
        foreach($the_like as $checking)  
          {  
              $likes .= $checking."";
          }
    $t_and_c = $_POST['t_and_c'];

    if(!($first_name==""||$last_name==""||$email==""||$username==""||$password==""||$c_password==""||$mobile_number==""||$dob==""||$country==""||$gender==""||$post==""||$likes==""||$t_and_c==""))
    {
        if(strlen($password)<8)
        {
            echo"<script>alert('Password Should Be Minimum 8 Characters!')</script>";
            echo "<script>window.open('Signup_f.php', '_self')</script>";
			exit();
        }
        $check_email = "SELECT * FROM users WHERE email='$email'";
        $q = mysqli_query($DB_Connect, $check_email);
        $check = mysqli_num_rows($q);
        if($check>0)
        {
            echo "<script>alert('Your Entered Email is Already Exist, Please Use Another Email')</script>";
			echo "<script>window.open('Signup_f.php', '_self')</script>";
			exit();
        }
        if($password===$c_password)
        {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $c_password_hash = password_hash($c_password, PASSWORD_DEFAULT);
            $insert="INSERT INTO users (first_name, last_name, profile_pic, email, username, password, c_password, mobile_number, dob, country, gender, likes, post, t_and_c, registered_date)
                    VALUES('$first_name', '$last_name', 'Profile_Pic.jpeg', '$email', '$username', '$password_hash', '$c_password_hash', '$mobile_number', '$dob', '$country', '$gender', '$likes', '$post', '$t_and_c', NOW())";
            $q = mysqli_query($DB_Connect, $insert);
            
            if($q==true)
            {
                echo "<script>alert('Congratulation $first_name $last_name, Your Account Created Successfully')</script>";
                echo "<script>window.open('../Login/Login_f.php', '_self')</script>";
            }
            else
            {
                echo "<script>alert('Registration Failed, Please Try Again!')</script>";
                echo "<script>window.open('Signup_f.php', '_self')</script>";
            }
        }
        else
		{
			echo "<script>alert('Entered Password Not Match Together')</script>";
		}
    }
    else
    {
        echo"<script>alert('Fill The Form Properly');</script>";
    }
}

?>