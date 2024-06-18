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
    <link rel="icon" href="" type="image/jpg" sizes="32x32">
    <link rel="stylesheet" href="../Signup/Signup.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Edit Account</title>
  </head>
  <body>
   <style>
      .upload-btn{background-color: #4267B2; color: white; border: 1px solid transparent; border-radius: 30px;}
      .upload-btn:hover{background-color: white; color: #4267B2; border-color: #4267B2;}
      
   </style>
   <hr style="margin-top: 60px;">
    <h1 style="text-align: center; margin-top: 20px; color: #4267B2;">Edit Account</h1>

    <div class="container">
      <div class="row">
              <div class="col-sm-12">
                <div class="form-group text-center">
                  <?php
                    echo"
                      <form action='index.php' method='post' enctype='multipart/form-data'>
                        <p class='select-pic'><input type='file' accept='video/*' name='video' size='70' placeholder='img' /></p>
                        <button id='btn' name='update' class='btn upload-btn'>Update Profile Picture</button>
                      </form>
                    ";
                    ?>
                    <?php echo get_posts();?>
                </div>
              </div>
            </div>
    </div>
    <?php
        if(isset($_POST['update']))
        {
          $file = $_FILES['video'];

          $file_name = $_FILES['video']['name'];
          $file_tmp_name = $_FILES['video']['tmp_name'];
          $file_size = $_FILES['video']['size'];
          $file_type = $_FILES['video']['type'];
          $file_error = $_FILES['video']['error'];

          $file_ext = explode('.', $file_name);
          $file_actual_ext = strtolower(end($file_ext));

          $allowed = array('mp4', '3gp', 'mkv');

          if($file_name=="")
          {
            echo "<script>alert('Please Select Profile Picture Then Upload')</script>";
            echo "<script>window.open('index.php' , '_self')</script>";
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
                  $file_destination = "video/".$file_name_new;
                  move_uploaded_file($file_tmp_name, $file_destination);
                  $insert = "INSERT INTO video (file) VALUES('$file_name_new')";
                  $run = mysqli_query($DB_Connect, $insert);
                  if($run)
                  {
                    echo "<script>window.open('index.php' , '_self')</script>";
                  }
                }
                else
                {
                  echo"<script>alert('Your File Size Is Too Big. Your File Size Should Be Less Than 50mb')</script>";
                  echo "<script>window.open('index.php' , '_self')</script>";
                  exit();
                }
              }
              else
              {
                echo"<script>alert('Error')</script>";
                echo "<script>window.open('index.php' , '_self')</script>";
                exit();
              }
            }
            else
            {
              echo"<script>alert('Sorry! You Can Not Upload This Types Of File.')</script>";
              echo "<script>window.open('index.php' , '_self')</script>";
              exit();
            }
          }
        }
      ?>
<!------------------------------------------------------------------------------------------------------------>

<?php
function get_posts()
{
	global $DB_Connect;
	$get_posts = "SELECT * FROM video ORDER BY 1 DESC";
	$run_posts = mysqli_query($DB_Connect, $get_posts);
	while($row_posts = mysqli_fetch_array($run_posts))
	{
		$id = $row_posts['id'];
		$the_file_name = $row_posts['file'];

			echo"
				<div class='container col-sm-7 text-center mt-3'>
					<div class='post-box'>
            <video src='video/$the_file_name' controls preload='none' width='100%' poster='P.jpg'></video>
					</div>
				</div>
			";
		}
  }
?>

