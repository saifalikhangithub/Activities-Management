<?php
session_start();

include_once("../../Include/DB_Connection.php"); 

if(!isset($_SESSION['email']))
{
  header("location: ../../Index.php");
  exit();
}
?>

<!DOCTYPE html>
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
    <title>Edit Post</title>
</head>
<body>
    <?php 
		if(isset($_GET['post_id']))
		{
			$get_id = $_GET['post_id'];			
			$get_post = "SELECT * FROM posts WHERE post_id='$get_id'";
			$run_post = mysqli_query($DB_Connect, $get_post);
			$row = mysqli_fetch_array($run_post);			
			$post_con = $row['post_content'];
		}
	?>
    <div class="container col-sm-7 text-center mt-3">
         <a href='../Profile.php'>Profile</a>
        <form action="" method="post" id="form" enctype="multipart/form-data">
            <textarea class="form-control" id="content" rows="3" name="content" title="You Can Write Only 5000 or Less Than 5000 Letters" placeholder="Write Hear Whatever You Want To Post..."></textarea>
		    <input type="submit" value="Post" class="btn btn-outline-primary mt-2" id="update-post-btn" name="update-post-btn" title="Click For Post">
        </form>
    </div>
    <!----------------------------------------------------------------------------------------------------------------->
    <script src="../../../B_v5.1/Bootstrap-5.1.3/JS/bootstrap.bundle.min.js"></script> <!--Bootstarp.js CDN File With Popper.js CDN File-->
    <script>//---JavaScript------------------
    </script>
</body>
</html>

<?php 
	if(isset($_POST['update-post-btn']))
	{
		$content = $_POST['content'];					
		$update_post = "UPDATE posts SET post_content='$content' WHERE post_id='$get_id'";
		$run_update = mysqli_query($DB_Connect, $update_post);
		if($run_update)
		{
			echo"<script>alert('Your Post Updated Successfully')</script>";
			echo"<script>window.open('../Profile.php', '_self')</script>";
		}
	}
?>