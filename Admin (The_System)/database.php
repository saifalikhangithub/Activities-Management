<?php
session_start();
include_once('DB_Connection.php');

if(!isset($_SESSION['email']))
{
	header("location: index.php");
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
    <link href="../B_v5.1/Bootstrap-5.1.3/CSS/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="" type="image/jpg" sizes="32x32">
    <title>Database</title>
  </head>
  <body>
    <style>
      /*------- Styling--------------------*/
      th{font-size: 12px;}
      td{font-size: 12px;}
      .status{font-weight: bold;}
      .nav-li-a{color: white; text-decoration: none; border: 1px solid transparent; padding: 10px 20px; border-radius: 20px; font-size: 20px;}
      .nav-li-a:hover{color: white; border-color: white;}
      .nav-li{padding: 5px;}
      .nav-color{background-color: #4267B2;}
      .nav-li-a:active {background-color: white; color: #4267B2;}
      #F{border: none; border-radius: 30px;}
    </style>
    <!----------------------------------------------------------------------------------------------------------------->
    <!--Start Coding-->

     <?php
      $user = $_SESSION['email'];
      $select = "SELECT * FROM admin WHERE email='$user'";
      $q = mysqli_query($DB_connect, $select);
      $row = mysqli_fetch_array($q);

      $user_id = $row['id'];
      $name = $row['name'];
      $Profile_Pic = $row['profile_pic'];
      
    ?>


    <nav class="navbar navbar-expand-lg navbar-light fixed-top nav-color"> 
      <div class="container-fluid">
        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal-profile"><img src="<?php echo"Images/$Profile_Pic"?>" alt="Logo" height="45px" width="45px" class="rounded-pill"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li title="Logout" class="nav-item nav-li"><a class="nav-li-a" href='logout.php?<?php echo "id=$user_id"?>'><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>               
              </ul>
              <form class="d-flex">
                <button id="F"><a class="nav-link" href="search.php" target="_blank">Search</a></button>
              </form>
            </div>
      </div>
    </nav>
    





<div class="modal fade" id="exampleModal-profile" tabindex="-1" aria-labelledby="exampleModalLabel-profile" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel-profile">Your Profile Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
            echo"
                <div class='text-center'>
                    <img src='Images/$Profile_Pic' alt='Your Profile Picture' class='rounded-circle' width='150px' height='150px' />
                    <h1>$name</h1>
                </div>
                ";
        ?>
      </div>
    </div>
  </div>
</div>




    <div class="container-fluid" style="margin-top: 60px;">
        <?php
            $select = "SELECT * FROM users ORDER BY 1 DESC";
            $query = mysqli_query($DB_connect, $select);
            if($row=mysqli_num_rows($query)>0)
            {
                echo'<table class="table table-hover table-sm table-bordered" style="text-align:center;">';
                    echo'<thead class="table-dark">';
                        echo'<tr>';
                            echo'<th scope="col">Id</th>';
                            echo'<th scope="col">Profile_Pic</th>';
                            echo'<th scope="col">First_Name</th>';
                            echo'<th scope="col">Last_Name</th>';
                            echo'<th scope="col">Username</th>';
                            echo'<th scope="col">Email</th>';
                            echo'<th scope="col">Contact</th>';
                            echo'<th scope="col">Date_Of_Birth</th>';
                            echo'<th scope="col">Country</th>';
                            echo'<th scope="col">Gender</th>';
                            echo'<th scope="col">Likes</th>';
                            echo'<th scope="col">Post</th>';
                            echo'<th scope="col">Terms_and_C</th>';
                            echo'<th scope="col">Registration_Date</th>';
                            echo'<th scope="col">Status</th>';
                            echo'<th scope="col">Last_Login</th>';
                            echo'<th scope="col">Delete</th>';
                            echo'</tr>';
                        echo'</thead>';
                    echo'<tbody>';

                    while($row = mysqli_fetch_assoc($query))
                    {
                        $id = $row['user_id'];
                        $profile_pic = $row['profile_pic'];
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $username = $row['username'];
                        $email = $row['email'];
                        $mobile_number = $row['mobile_number'];
                        $dob = $row['dob'];
                        $country = $row['country'];
                        $gender = $row['gender'];
                        $likes = $row['likes'];
                        $post = $row['post'];
                        $t_and_c = $row['t_and_c'];
                        $registered_date = $row['registered_date'];
                        $status = $row['status'];
                        $last_login = $row['last_login'];                        
                        $delete = '<a href="delete.php?delete_id='.$id.'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></a>';

                        echo'<tr>';
                            echo'<td class="align-middle">'.$id.'</td>';
                            echo'<td class="align-middle">'."<img src='../The System/Images/Profile_Pics/$profile_pic' class='rounded-pill' height='70px' width='70px'".'</td>';
                            echo'<td class="align-middle">'.$first_name.'</td>';
                            echo'<td class="align-middle">'.$last_name.'</td>';
                            echo'<td class="align-middle">'.$username.'</td>';
                            echo'<td class="align-middle">'.$email.'</td>';
                            echo'<td class="align-middle">'.$mobile_number.'</td>';
                            echo'<td class="align-middle">'.$dob.'</td>';
                            echo'<td class="align-middle">'.$country.'</td>';
                            echo'<td class="align-middle">'.$gender.'</td>';
                            echo'<td class="align-middle">'.$likes.'</td>';
                            echo'<td class="align-middle">'.$post.'</td>';
                            echo'<td class="align-middle">'.$t_and_c.'</td>';
                            echo'<td class="align-middle">'.$registered_date.'</td>';
                            echo'<td class="align-middle status">'.$status.'</td>';
                            echo'<td class="align-middle">'.$last_login.'</td>';
                            echo'<td class="align-middle">'.$delete.'</td>';
                        echo'</tr>';
                    }
            }
        ?>
    </div>
    <!----------------------------------------------------------------------------------------------------------------->
    <script src="../B_v5.1/Bootstrap-5.1.3/JS/bootstrap.bundle.min.js"></script> <!--Bootstarp.js CDN File With Popper.js CDN File-->
  </body>
</html>
