
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
    </style>
    <!----------------------------------------------------------------------------------------------------------------->
    <!--Start Coding-->
        <div class="container mt-5" style="text-align: center;">
        <h1>My System</h1>
            <form action="" method="post">
                <button id="signup" class="btn btn-info btn-lg" name="signup">Sign up</button><br><br>
                    <?php
                        if(isset($_POST['signup']))
                        {
                            echo "<script>window.open('signup.php','_self')</script>";
                        }
                    ?>
                    
                <button id="login" class="btn btn-info btn-lg" name="login">Login</button><br><br>
                    <?php
                        if(isset($_POST['login']))
                        {
                            echo "<script>window.open('login.php','_self')</script>";
                        }
                    ?>
            </form>
        </div>
    <!----------------------------------------------------------------------------------------------------------------->
    <script src="../B_v5.1/Bootstrap-5.1.3/JS/bootstrap.bundle.min.js"></script> <!--Bootstarp.js CDN File With Popper.js CDN File-->
    <script>//---JavaScript------------------
    </script>
  </body>
</html>