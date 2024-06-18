
<?php include_once("DB_Connection.php"); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="this is description of the title write something about your webpage which is show on while some one search and browsing">
    <meta name="keywords" content="white, keywords, about, your, webpage, to, rank, your, website, on, google, search, results">
    <meta name="author" content="about you">
    <link href="../../B_v5.1/Bootstrap-5.1.3/CSS/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="" type="image/jpg" sizes="32x32">
  </head>
  <body>
    <style>
    /*------- Styling--------------------*/
      body{background-color: #c8d8f7;}
      .nav-li-a{color: white; text-decoration: none; border: 1px solid transparent; padding: 10px 20px; border-radius: 20px; font-size: 20px;}
      .nav-li-a:hover{color: white; border-color: white;}
      .nav-li{padding: 5px;}
      .nav-color{background-color: #4267B2;}
      .nav-li-a:active {background-color: white; color: #4267B2;}
      .p-r{background-color: #4267B2; color: white; border: 1px solid transparent; border-radius: 30px;}
      .p-r:hover{background-color: white; color: #4267B2; border-color: #4267B2;}
      td{color: #4267B2;}
    </style>
    <!----------------------------------------------------------------------------------------------------------------->
    <!--Start Coding-->

    <?php
      $user = $_SESSION['email'];
      $select = "SELECT * FROM users WHERE email='$user'";
      $q = mysqli_query($DB_Connect, $select);
      $row = mysqli_fetch_array($q);

      $user_id = $row['user_id'];
      $first_name = $row['first_name'];
      $last_name = $row['last_name'];
      $Profile_Pic = $row['profile_pic'];
      $email = $row['email'];
      $username = $row['username'];
      $password = $row['password'];
      $c_password = $row['c_password'];
      $mobile_number = $row['mobile_number'];
      $dob = $row['dob'];
      $country = $row['country'];
      $gender = $row['gender'];
      $likes = $row['likes'];
      $post = $row['post'];
      $registered_date = $row['registered_date'];
    ?>


    <nav class="navbar navbar-expand-lg navbar-light fixed-top nav-color"> 
      <div class="container-fluid">
        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal-profile"><img src="<?php echo"../Images/Profile_Pics/$Profile_Pic"?>" alt="Logo" height="45px" width="45px" class="rounded-pill"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li title="It's you" class="nav-item nav-li"><a class="nav-li-a" href='Profile.php?<?php echo "user_id=$user_id" ?>'><span class="glyphicon glyphicon-user"></span><?php echo " $first_name $last_name"; ?></a></li>
                <li title="GoTo Home Screen" class="nav-item nav-li"><a class="nav-li-a" href='Home.php?<?php echo "user_id=$user_id" ?>'><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li title="Members" class="nav-item nav-li"><a class="nav-li-a" href='Members.php?<?php echo "user_id=$user_id" ?>'><span class="glyphicon glyphicon-user"></span> Members</a></li>
                <li title="Logout" class="nav-item nav-li"><a class="nav-li-a" href='Logout.php?<?php echo "user_id=$user_id" ?>'><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>               
              </ul>
              <form class="d-flex">
                <a class="navbar-brand" href="../Pages/Home.php" title="The System" style="color: white;"> The System</a>
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
                  <img src='../Images/Profile_Pics/$Profile_Pic' alt='Your Profile Picture' class='rounded-circle' width='150px' height='150px' />
                </div>
                <div class='container-fluid'>
                  <div class='row'>
                    <div class='col-sm-12'>
                      <table>
                        <tr>
                            <th>Name </th>
                            <td>$first_name $last_name</td>
                        </tr>
                        <tr>
                            <th>Gender </th>
                            <td>$gender</td>
                        </tr>
                        <tr>
                            <th>Email </th>
                            <td>$email</td>
                        </tr>
                        <tr>
                            <th>Username </th>
                            <td>$username</td>
                        </tr>
                        <tr>
                            <th>Mobile Number </th>
                            <td>$mobile_number</td>
                        </tr>
                        <tr>
                            <th>Date Of Birth </th>
                            <td>$dob</td>
                        </tr>
                        <tr>
                            <th>Country </th>
                            <td>$country</td>
                        </tr>
                        <tr>
                            <th>Likes </th>
                            <td>$likes</td>
                        </tr>
                        <tr>
                            <th>Post </th>
                            <td>$post</td>
                        </tr>
                        <tr>
                            <th>Active Since </th>
                            <td>$registered_date</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              ";
        ?>
          <a href='Edit_Account.php?<?php echo "user_id=$user_id" ?>'>
            <div class="text-center mt-3">
              <input type="button" class="btn btn-outline-primary p-r" value="Edit Profile">
            </div>
          </a>
      </div>
    </div>
  </div>
</div>
    <!----------------------------------------------------------------------------------------------------------------->
    <script src="../B_v5.1/Bootstrap-5.1.3/JS/bootstrap.bundle.min.js"></script> <!--Bootstarp.js CDN File With Popper.js CDN File-->
  </body>
</html>