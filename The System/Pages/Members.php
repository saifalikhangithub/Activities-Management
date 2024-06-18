<?php
session_start();

include_once("../Include/Navbar.php"); 

if(!isset($_SESSION['email']))
{
  header("location: ../Index.php");
  exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="this is description of the title write something about your webpage which is show on while some one search and browsing">
    <meta name="keywords" content="white, keywords, about, your, webpage, to, rank, your, website, on, google, search, results">
    <meta name="author" content="about you">
    <title>Members</title>
  </head>
  <body>
    <style>
    /*------- Styling--------------------*/
    .search-box{width: 100%; border-radius:30px; padding:10px; border:2px solid #4267B2;}
    .search-btn{color: white; background-color: #4267B2; border: 1px solid #4267B2; border-radius: 30px; margin-top:5px;}
    .search-btn:hover{color: #4267B2; background-color: white; border-color: #4267B2;}

    .find_people{width: 100%; border:2px solid #4267B2; background-color: white; border-radius:50px; padding:10px;}
    .user-name-link{display: inline; color: #4267B2;}
    </style>
    <!----------------------------------------------------------------------------------------------------------------->
    <!--Start Coding-->
    <hr style="margin-top: 60px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 text-center">
                    <form class="search_form" action="">
                        <input type="text" class="form-control search-box mt-3" placeholder="Search" name="search_user">
                        <input type="submit" id="search_user_btn" name="search_user_btn" class="btn btn-info search-btn" value="Search">
				    </form>
                </div>
                <div class="col-sm-9">
                    <?php
                        if (isset($_GET['search_user_btn']))
                        {
                            $the_search = htmlentities(mysqli_real_escape_string($DB_Connect, $_GET['search_user']));
                            $select = "SELECT * FROM users WHERE first_name LIKE '%$the_search%' OR last_name LIKE '%$the_search%' OR username LIKE '%$the_search%' OR email LIKE '%$the_search%'";
                        }
                        else
                        {
                            $select = "SELECT * FROM users";
                        }
                        $q = mysqli_query($DB_Connect, $select);
                        while($row = mysqli_fetch_array($q))
                        {
                            $user_id = $row['user_id']; 
                            $first_name = $row['first_name'];
                            $last_name = $row['last_name'];
                            $username = $row['username'];
                            $Profile_Pic = $row['profile_pic'];
                                
                            echo"                             
                                <div class='find_people mt-3'>
                                    <div>
                                        <a href='User_Profile.php?user_id=$user_id'><img class='rounded-circle' src='../Images/Profile_Pics/$Profile_Pic' title='$first_name $last_name' width='100px' height='100px'></a>
                                        <a href='User_Profile.php?user_id=$user_id' style='text-decoration: none;'><strong><h2 title='Name of The User' class='user-name-link'>$first_name $last_name</h2></strong></a>
                                        <a href='User_Profile.php?user_id=$user_id' style='text-decoration: none;'><strong><h2 title='Username' class='user-name-link'>$username</h2></strong></a>
                                    </div>
                                </div>
                                ";
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    <!----------------------------------------------------------------------------------------------------------------->
    <script>//---JavaScript------------------
    </script>
  </body>
</html>

