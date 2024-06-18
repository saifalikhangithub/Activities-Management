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
    <link rel="stylesheet" href="Signup.css"> 
    <title>Sign Up</title>
  </head>
  <body>
   
    <h1 style="text-align: center; margin-top: 20px; color: #4267B2;">Registration</h1>
    <div class="container-fluid col-sm-7 mt-5">
        <form action="Signup_b.php" method="post" name="the_form" id="the_form" onsubmit="return form_validation_function()">
            
            <div class="row g-3">
              <div class="col-sm-3">
                <div class="form-group">
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" minlength="3" maxlength="20" pattern="^[a-zA-Z]+( [a-zA-Z]+)*$" title="Only Text Allowed" required>
                  <small class="invalid-feedback">Only Text Allowed</small><small class="valid-feedback">Looks Good!</small>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" minlength="3" maxlength="20" pattern="^[a-zA-Z]+( [a-zA-Z]+)*$" title="Only Text Allowed" required>
                  <small class="invalid-feedback">Only Text Allowed</small><small class="valid-feedback">Looks Good!</small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" maxlength="50" pattern="^([_\.0-9a-zA-Z]+)@([a-zA-Z]+)\.([a-zA-Z]){2,30}$" title="Use Valid Email" required>
                  <small class="invalid-feedback">Enter Full Email Address</small><small class="valid-feedback">Email Verified!</small>
                </div>
              </div>
            </div>

            

            <div class="row g-3 mt-0">
              <div class="col-sm-4">
                <div class="form-group">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="8" maxlength="12" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,12}$" title="Password Must Contain Letters, Numbers, Special Characters And Password Length Must Be 8 -12" required>
                  <small class="invalid-feedback">Password Must Contain Letters, Numbers, Special Characters And Password Length Must Be 8 -12</small><small class="valid-feedback">Strong Password!</small>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <input type="password" class="form-control" id="c_password" name="c_password" placeholder="Confirm Password" minlength="8" maxlength="12" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,12}$" title="" required>
                  <small class="invalid-feedback">Both Password Should Be Match Together</small><small class="valid-feedback">Strong Password!</small>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <input type="tel" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number" minlength="10" maxlength="10" pattern="^([0-9]){10,10}$" title="Only 10 Digits" required>
                  <small class="invalid-feedback">Enter Only Number</small><small class="valid-feedback">Looks Good!</small>
                </div>
              </div>
            </div>


            <div class="row g-3">
              <div class="col-sm-6">
                <div class="form-group gender-area mt-3">
                  <div class="row">
                    <div class="col">
                      <input type="radio" class="form-check-input" name="gender" id="male" value="Male">
                      <label class="form-check-label" for="male"> Male</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="form-check-input" name="gender" id="female" value="Female">
                      <label class="form-check-label" for="female"> Female</label>                  
                    </div>
                    <div class="col">
                      <input type="radio" class="form-check-input" name="gender" id="other" value="Other">      
                      <label class="form-check-label" for="other"> Other</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group mt-3">
                  <select class="form-select" name="country" id="country" title="Select Your Country" required>
                    <option value="" disabled selected>Select Your Country</option>
                    <option value="India">India</option>
                    <option value="USA">USA</option>
                    <option value="UK">UK</option>
                  </select>
                </div>
              </div>
            </div>



            <div class="row g-3">
              <div class="col-sm-6">
                <div class="form-group like-area mt-3">
                  <label for="dob" class="form-label" style="color: #4267B2;">Date Of Birth</label>
                  <input type="date" class="form-control" name="dob" id="dob" min="1975-01-01" max="<?php echo date("Y-m-d"); ?>" title="Date Of Birth" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group like-area mt-3">
                  <label class="form-label" style="color: #4267B2;">What Would You Likes</label>
                  <div class="row">
                    <div class="col">
                      Coding :- <input type="checkbox" class="form-check-input" name="like[]" id="coding" value="(Coding)">
                    </div>
                    <div class="col">
                      Driving :- <input type="checkbox" class="form-check-input" name="like[]" id="driving" value="(Driving)">        
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      Gaming :- <input type="checkbox" class="form-check-input" name="like[]" id="gaming" value="(Gaming)">
                    </div>
                    <div class="col">
                      Nothing :- <input type="checkbox" class="form-check-input" name="like[]" id="nothing" value="(Nothing)">  
                    </div>
                  </div>
                </div>
              </div>
            </div>

                <div class="form-check form-switch mt-2">
                  <input class="form-check-input" type="checkbox" name="t_and_c" id="t_and_c" value="I Accept" required>
                  <label class="form-check-label" for="t_and_c">I Accept Terms And Conditions</label>
                </div>
        
    
            <div class="text-center">
              <input type="submit" id="submit" name="submit" class="btn btn-outline-primary mt-3" value="Submit">
            </div>

            <div class="text-center mt-3">
              <a href="../Login/Login_f.php" title="Go To Login Page" class="login-link">Already Have An Account</a>
            </div>

        </form>
    </div>
<!----------------------------------------------------------------------------------------------------------------->
<script src="../../B_v5.1/Bootstrap-5.1.3/JS/bootstrap.bundle.min.js"></script> <!--Bootstarp.js CDN File With Popper.js CDN File-->
    <script type="text/javascript" src="Signup.js"></script>
  </body>
</html>