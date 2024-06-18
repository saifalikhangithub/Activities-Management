<?php
session_start();
include_once('DB_Connection.php');
?>
<?php
        if(isset($_POST['submit']))
        {
            $email = htmlentities(mysqli_real_escape_string($DB_connect,$_POST['email']));
            $password = htmlentities(mysqli_real_escape_string($DB_connect,$_POST['password']));

            $select = "select * from admin where email='$email'";
            $q = mysqli_query($DB_connect, $select);
            $check = mysqli_num_rows($q);
            if($check==1)
            {
                while($row=mysqli_fetch_assoc($q))
                {
                    if(password_verify($password, $row['password']))
                    {
                        $_SESSION['email'] = $email;
                        echo "<script>window.open('database.php', '_self')</script>";
                    }
                    else
                    {
                        echo"<script>alert('Your Email or Password is Incorrect')</script>";
                    }
                }
            }
        }
        ?>