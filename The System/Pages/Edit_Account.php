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
    <link rel="icon" href="" type="image/jpg" sizes="32x32">
    <link rel="stylesheet" href="../Signup/Signup.css"> 
    <title>Edit Account</title>
  </head>
  <body>
   <style>
      .upload-btn{background-color: #4267B2; color: white; border: 1px solid transparent; border-radius: 30px;}
      .upload-btn:hover{background-color: white; color: #4267B2; border-color: #4267B2;}
      .change-pic{background-color: #4267B2; color: white; border: 1px solid transparent; border-radius: 30px;}
      .change-pic:hover{background-color: white; color: #4267B2; border-color: #4267B2;}
      .p-r{background-color: #4267B2; color: white; border: 1px solid transparent; border-radius: 30px;}
      .p-r:hover{background-color: white; color: #4267B2; border-color: #4267B2;}
      .select-pic{background-color: #4267B2;}
   </style>
   <hr style="margin-top: 60px;">
    <h1 style="text-align: center; margin-top: 20px; color: #4267B2;">Edit Account</h1>

    <div class="container">
      <div class="row">
              <div class="col-sm-12">
                <div class="form-group text-center">
                  <?php
                    echo"
                    <div id='profile_img'>
                    <img src='../Images/Profile_Pics/$Profile_Pic' alt='Your Profile Picture' class='rounded-circle' width='150px' height='150px' />
                      <form action='Edit_Account.php?user_id=$user_id' method='post' enctype='multipart/form-data'>
                        <div class='dropdown'>
                          <button class='btn dropdown-toggle change-pic' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                            Change Profile Picture
                          </button>
                          <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                            <li>
                              <center>
                                <p>First Click on <strong>Choose File,</strong> Select Profile Picture Then <br> Click on <strong>Update Profile Picture</strong></p>
                                <p class='select-pic'><input type='file' accept='image/jpg, image/jpeg, image/png' name='profile_pic' size='70' placeholder='img' /></p>
                                <button id='btn' name='update' class='btn upload-btn'>Update Profile Picture</button>
                              </center>
                            </li>
                          </ul>
                        </div>
                      </form>
                    </div>
                    ";
                    ?>
                </div>
              </div>
            </div>
    </div>
    <?php
        if(isset($_POST['update']))
        {
          $file = $_FILES['profile_pic'];

          $file_name = $_FILES['profile_pic']['name'];
          $file_tmp_name = $_FILES['profile_pic']['tmp_name'];
          $file_size = $_FILES['profile_pic']['size'];
          $file_type = $_FILES['profile_pic']['type'];
          $file_error = $_FILES['profile_pic']['error'];

          $file_ext = explode('.', $file_name);
          $file_actual_ext = strtolower(end($file_ext));

          $allowed = array('jpg', 'jpeg', 'png');

          if($file_name=="")
          {
            echo "<script>alert('Please Select Profile Picture Then Upload')</script>";
            echo "<script>window.open('Edit_Account.php?user_id=$user_id' , '_self')</script>";
            exit();
          }
          else
          {
            if(in_array($file_actual_ext, $allowed))
            {
              if($file_error===0)
              {
                if($file_size < 10485760) // (Byte To MB) (10485760 Byte - 10 mb)
                {
                  $file_name_new = $file_name.uniqid('', true).".".$file_actual_ext;
                  $file_destination = "../Images/Profile_Pics/".$file_name_new;
                  move_uploaded_file($file_tmp_name, $file_destination);
                  $update = "UPDATE users SET profile_pic='$file_name_new' WHERE user_id='$user_id'";
                  $run = mysqli_query($DB_Connect, $update);
                  if($run)
                  {
                    echo "<script>window.open('Edit_Account.php?user_id=$user_id' , '_self')</script>";
                  }
                }
                else
                {
                  echo"<script>alert('Your File Size Is Too Big. Your File Size Should Be Less Than 50mb')</script>";
                  echo "<script>window.open('Edit_Account.php?user_id=$user_id' , '_self')</script>";
                  exit();
                }
              }
              else
              {
                echo"<script>alert('Error')</script>";
                echo "<script>window.open('Edit_Account.php?user_id=$user_id' , '_self')</script>";
                exit();
              }
            }
            else
            {
              echo"<script>alert('Sorry! You Can Not Upload This Types Of File.')</script>";
              echo "<script>window.open('Edit_Account.php?user_id=$user_id' , '_self')</script>";
              exit();
            }
          }
        }
      ?>
<!------------------------------------------------------------------------------------------------------------>




    <div class="container-fluid col-sm-7 mt-4">
        <form action="" method="post" name="the_form" id="the_form" onsubmit="return form_validation_function()">
            
            <div class="row g-3">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo"$email";?>" title="This id Your Email" disabled required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="username" name="username" value="<?php echo"$username";?>" title="This is Your Username" disabled required>
                </div>
              </div>
            </div>

            <div class="row g-3 mt-0">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo"$first_name";?>" placeholder="First Name" minlength="3" maxlength="20" pattern="^[a-zA-Z]+( [a-zA-Z]+)*$" title="Only Text Allowed" required>
                  <small class="invalid-feedback">Only Text Allowed</small><small class="valid-feedback">Looks Good!</small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo"$last_name";?>" placeholder="Last Name" minlength="3" maxlength="20" pattern="^[a-zA-Z]+( [a-zA-Z]+)*$" title="Only Text Allowed" required>
                  <small class="invalid-feedback">Only Text Allowed</small><small class="valid-feedback">Looks Good!</small>
                </div>
              </div>
            </div>            

            <div class="row g-3 mt-0">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="tel" class="form-control" id="mobile_number" name="mobile_number" value="<?php echo"$mobile_number";?>" placeholder="Mobile Number" minlength="10" maxlength="10" pattern="^([0-9]){10,10}$" title="Only 10 Digits" required>
                  <small class="invalid-feedback">Enter Only Number</small><small class="valid-feedback">Looks Good!</small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <select class="form-select" name="country" id="country" title="Select Your Country" required>
                    <option value="<?php echo"$country";?>" selected><?php echo"$country";?></option>
                    <option value="India">India</option>
                    <option value="USA">USA</option>
                    <option value="UK">UK</option>
                  </select>
                </div>
              </div>
            </div>


            <div class="row g-3">
              <div class="col-sm-12">
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
            </div>



            <div class="row g-3">
              <div class="col-sm-12">
                <div class="form-group like-area mt-3">
                  <label for="dob" class="form-label" style="color: #4267B2;">Date Of Birth</label>
                  <input type="date" class="form-control" name="dob" id="dob" value="<?php echo"$dob";?>" title="Date Of Birth" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
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
        
    
            <div class="text-center">
              <input type="submit" id="submit" name="submit" class="btn btn-outline-primary mt-3" value="Submit">
            </div>

             <div class="text-center mt-3">
              <a href="#" title="Change Password" class="login-link"  data-bs-toggle="modal" data-bs-target="#exampleModal">Change Password</a>
            </div>
            
        </form>
    </div>

<!-- Modal--------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Your Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="" method="post" name="the_form" id="the_form">

          <b><?php echo"$email";?></b>

          <div class="form-group">
            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password" minlength="8" maxlength="12" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,12}$" required>
            <small class="valid-feedback">This is Your Old Password</small>
          </div>

          <div class="form-group mt-3">
            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password" minlength="8" maxlength="12" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,12}$" title="Password Must Contain Letters, Numbers, Special Characters And Password Length Must Be 8 -12" required>
            <small class="invalid-feedback">Password Must Contain Letters, Numbers, Special Characters And Password Length Must Be 8 -12</small><small class="valid-feedback">Strong Password!</small>
          </div>
        
          <div class="form-group">
            <input type="password" class="form-control" id="c_new_password" name="c_new_password" placeholder="Confirm New Password" minlength="8" maxlength="12" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,12}$" title="" required>
            <small class="invalid-feedback">Both Password Should Be Match Together</small><small class="valid-feedback">Strong Password!</small>
          </div>
          
          <div class="text-center mt-3">
            <input type="submit" name="password_change" class="btn btn-outline-primary p-r" value="Reset Password">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  const old_password = document.getElementById('old_password');
    old_password.onkeyup = ()=>{
      let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,12}$/;
      let str = old_password.value;
        if(regex.test(str))
        {    
          old_password.classList.remove('is-invalid');
          old_password.classList.add('is-valid');   
        }
        else
        {    
          old_password.classList.add('is-invalid');
          old_password.classList.remove('is-valid');  
        }
      };

  const new_password = document.getElementById('new_password');
    new_password.onkeyup = ()=>{
      let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,12}$/;
        let str = new_password.value;
          if(regex.test(str))
          {    
            new_password.classList.remove('is-invalid');
            new_password.classList.add('is-valid');   
          }
          else
          {    
            new_password.classList.add('is-invalid');
            new_password.classList.remove('is-valid');  
          }
        };

  const c_new_password = document.getElementById('c_new_password');
    c_new_password.onkeyup = ()=>{
      let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,12}$/;
        let str = c_new_password.value;
          if(regex.test(str))
          {    
            c_new_password.classList.remove('is-invalid');
            c_new_password.classList.add('is-valid');   
          }
          else
          {    
            c_new_password.classList.add('is-invalid');
            c_new_password.classList.remove('is-valid');  
          }
        };
</script>

<?php
if(isset($_POST['password_change']))
{
  $old_password = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['old_password']));
  $new_password = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['new_password']));
  $c_new_password = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['c_new_password']));

  if(!($old_password==""||$new_password==""||$c_new_password==""))
  {
    if($new_password===$c_new_password)
    {
      $select = "SELECT * FROM users WHERE email='$email'";
      $q= mysqli_query($DB_Connect, $select);
      $check = mysqli_num_rows($q);
      if($check == 1)
      {
        while($row=mysqli_fetch_assoc($q))
        {
          if(password_verify($old_password, $row['password']))
          {
            $the_new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
            $the_c_new_password_hash = password_hash($c_new_password, PASSWORD_DEFAULT);
            $p_update = "UPDATE users SET password='$the_new_password_hash', c_password='$the_c_new_password_hash'";
            $q = mysqli_query($DB_Connect, $p_update);
            echo"<script>alert('Password Reset Successfully')</script>";
            echo "<script>window.open('Edit_Account.php', '_self')</script>";
          }
          else
          {
            echo"<script>alert('Your Old Email or Password is Incorrect')</script>";
            echo "<script>window.open('Edit_Account.php', '_self')</script>";
          }
        }
      }
      else
      {
        echo"<script>alert('Your Record Not Exist')</script>";
        echo "<script>window.open('Edit_Account.php', '_self')</script>";
      }
    }
    else
		{
			echo "<script>alert('Entered Password Not Match Together')</script>";
		}
  }
}
?>

<!----------------------------------------------------------------------------------------------------------------->
    <script type="text/javascript">
        
function form_validation_function()
{
    //Select Validation
        let f_name = document.getElementById("first_name");
        let l_name = document.getElementById("last_name");
        let mob_number = document.getElementById("mobile_number");
        let country = document.getElementById("country");
        if(f_name==""||l_name==""||mob_number==""||country.value == "")
        {
            alert("Fill The Form Properly");
            return false;
        }
    
    
    //Radio Button Validation
        let gender_value = document.getElementsByName('gender');
        let the_gender = false;
        for(let i=0; i<gender_value.length;i++)
        {
            if(gender_value[i].checked == true)
            {
                the_gender = true;
                break;
            }
        }
        if(!the_gender){alert("Choose Your Gender"); return false;}


    //CheckBox Validation
        let checkbox_value = false;
        if(document.getElementById("coding").checked){checkbox_value==true;}
        else if(document.getElementById("driving").checked){checkbox_value==true;}
        else if(document.getElementById("gaming").checked){checkbox_value==true;}
        else if(document.getElementById("nothing").checked){checkbox_value==true;}
        else {alert("Select Your Likes"); return false};



}
//-----------------------------------------------------------------------------------------------------------------------

const first_name = document.getElementById('first_name');
              first_name.onkeyup = ()=>{
                  let regex = /^[a-zA-Z]+( [a-zA-Z]+)*$/;
                  let str = first_name.value;
                  if(regex.test(str))
                  {
                    first_name.classList.remove('is-invalid');
                    first_name.classList.add('is-valid');  
                  }
                  else
                  {
                    first_name.classList.add('is-invalid');
                    first_name.classList.remove('is-valid');  
                  }
              };

        const last_name = document.getElementById('last_name');
              last_name.onkeyup = ()=>{
                  let regex = /^[a-zA-Z]+( [a-zA-Z]+)*$/;
                  let str = last_name.value;
                  if(regex.test(str))
                  {
                    last_name.classList.remove('is-invalid');
                    last_name.classList.add('is-valid');   
                  }
                  else
                  {
                    last_name.classList.add('is-invalid');
                    last_name.classList.remove('is-valid');  
                  }
              };

              const mobile_number = document.getElementById('mobile_number');
              mobile_number.onkeyup = ()=>{
                  let regex = /^([0-9]){10,10}$/;;
                  let str = mobile_number.value;
                  if(regex.test(str))
                  {
                    mobile_number.classList.remove('is-invalid');
                    mobile_number.classList.add('is-valid');   
                  }
                  else
                  {    
                    mobile_number.classList.add('is-invalid');
                    mobile_number.classList.remove('is-valid');  
                  }
              };
    </script>
  </body>
</html>

<?php

if(isset($_POST['submit']))
{
    $f_name = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['first_name']));
    $l_name = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['last_name']));
    $mob_number = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['mobile_number']));
    $u_country = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['country']));
    $u_gender = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['gender']));
    $likes="";
    $the_like = $_POST['like'];
        foreach($the_like as $checking)  
          {  
              $likes .= $checking."";
          }
    $u_dob = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['dob']));
        

    if(!($f_name==""||$l_name==""||$mob_number==""||$u_country==""||$u_gender==""||$likes==""||$u_dob==""))
    {
      $update = "UPDATE users SET first_name='$f_name', last_name='$l_name', mobile_number='$mob_number', country='$u_country', gender='$u_gender', likes='$likes', dob='$u_dob' WHERE user_id='$user_id'";
			$q = mysqli_query($DB_Connect, $update);
		
			if($q)
			{
				echo"<script>alert('Your Profile Updated Successfully')</script>";
				echo"<script>window.open('Profile.php?user_id=$user_id','_self')</script>";
			}
			else
			{
				echo"<script>alert('Error')</script>";
        echo "<script>window.open('Edit_Account.php?user_id=$user_id' , '_self')</script>";
        exit();
			}
    }
    else
    {
      echo"<script>alert('Fill The Form Properly')</script>";
      echo "<script>window.open('Edit_Account.php?user_id=$user_id' , '_self')</script>";
      exit();
    }
}
?>