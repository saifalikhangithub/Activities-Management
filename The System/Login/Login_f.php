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
    <link rel="stylesheet" href="Login.css">
    <title>Login</title>
  </head>
  <body>
   
  <h1 style="text-align: center; margin-top: 20px; color: #4267B2;">Login</h1>
    <div class="container-fluid col-sm-5 mt-5">
        <form action="Login_b.php" method="post" name="the_form" id="the_form" onsubmit="return form_validation_function()">
            <div class="form-group mt-3">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" maxlength="50" pattern="^([_\.0-9a-zA-Z]+)@([a-zA-Z]+)\.([a-zA-Z]){2,30}$" title="Use Valid Email" required>
              <small class="invalid-feedback">Enter Full Email Address</small><small class="valid-feedback">Email Verified!</small>
            </div>
            <div class="row g-2 mt-2">
              <div class="col">
                <div class="form-group">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="8" maxlength="12" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,12}$" title="Password Must Contain Letters, Numbers, Special Characters And Password Length Must Be 8 -12" required>
                  <small class="invalid-feedback">Password Must Contain Letters, Numbers, Special Characters And Password Length Must Be 8 -12</small><small class="valid-feedback">Strong Password!</small>
                </div>
              </div>
            </div>
            <div class="text-center">
              <input type="submit" id="submit" name="submit" class="btn btn-outline-primary mt-3" value="Submit">
            </div>
            <div class="text-center mt-3">
              <a href="../Signup/Signup_f.php" title="Go To Signup Page" class="sign_up-link">Don't Have An Account</a>
            </div>
        </form>
    </div>
<!----------------------------------------------------------------------------------------------------------------->
    <script src="../B_v5.1/Bootstrap-5.1.3/JS/bootstrap.bundle.min.js"></script> <!--Bootstarp.js CDN File With Popper.js CDN File-->
    <script type="text/javascript" src="Login.js"></script>
  </body>
</html>
