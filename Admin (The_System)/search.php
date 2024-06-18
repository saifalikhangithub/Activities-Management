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
    <title></title>
  </head>
  <body>
    <style>
    /*------- Styling--------------------*/
        th{font-size: 12px;}
        td{font-size: 12px;}
        .status{font-weight: bold;}
        .search{border: 2px solid #4267B2;}
        .search-btn{border: 2px solid #4267B2; color: #4267B2; font-size: 15px;}
        .search-btn:hover{background-color: #4267B2; color: white;}
    </style>
    <!----------------------------------------------------------------------------------------------------------------->
    <!--Start Coding-->

    <div class="container col-sm-5 mt-3 mb-3">
        <form class="d-flex">
            <input class="form-control search me-2" type="search" placeholder="Search" name="search_user" aria-label="Search">
            <button class="btn btn-default search-btn" name="search_user_btn" type="submit">Search</button>
        </form>
    </div>

    <div class="container-fluid">
        <?php search_user(); ?>
    </div>
    <!----------------------------------------------------------------------------------------------------------------->
    <script src="../B_v5.1/Bootstrap-5.1.3/JS/bootstrap.bundle.min.js"></script> <!--Bootstarp.js CDN File With Popper.js CDN File-->
    <script>//---JavaScript------------------
    </script>
  </body>
</html>

<?php
    function search_user()
    {
        global $DB_connect;
        
        if (isset($_GET['search_user_btn']))
        {
            $search_query = htmlentities($_GET['search_user']);
            $get_user = "select * from users where first_name like '%$search_query%' OR last_name like '%$search_query%' OR username like '%$search_query%'";
        }
        else
        {
            $get_user = "select * from users";
        }
        $run_user = mysqli_query($DB_connect, $get_user);
        if($row=mysqli_num_rows($run_user)>0)
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

                    while($row = mysqli_fetch_assoc($run_user))
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
    }
?>