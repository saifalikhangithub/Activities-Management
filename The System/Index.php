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
    body{background-color: #c8d8f7;}
    .btn{border-radius: 30px; background-color: white; border-color: #4267B2; color: #4267B2; padding: 10px; font-size: 25px; width: 70%;}
    .btn:hover{background-color: #4267B2; border-color: #4267B2;}
    .h1{text-align: center; background-color: #4267B2; color: white; font-size: 50px; padding: 20px;}
    .table{text-align: center; text-transform: capitalize;}
    </style>
    <!----------------------------------------------------------------------------------------------------------------->
    <!--Start Coding-->
    <h1 class="h1">This Is The System</h1>
    <table class="table">
      <thead>
        <tr>
          <th>this website is only for form validation testing purpose</th>
        </tr>
      </thead>
    </table>
      <div class="container col-sm-7 mt-5 text-center">
        <form method="post" action="">
          <input type="submit" class="btn btn-outline-primary" value="Signup" name="signup" id="signup" />
          <?php
            if(isset($_POST['signup'])){
              echo "<script>window.open('Signup/Signup_f.php','_self')</script>";
            }
          ?>

<br><br>

          <input type="submit" class="btn btn-outline-primary" value="Login" name="login" id="login" />
          <?php
            if(isset($_POST['login'])){
              echo "<script>window.open('Login/Login_f.php','_self')</script>";
            }
          ?>
       </form>
      </div>
    <!----------------------------------------------------------------------------------------------------------------->
    <script src="../B_v5.1/Bootstrap-5.1.3/JS/bootstrap.bundle.min.js"></script> <!--Bootstarp.js CDN File With Popper.js CDN File-->
  </body>
</html>