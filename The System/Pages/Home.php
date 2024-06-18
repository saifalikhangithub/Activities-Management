<?php
session_start();

include("../Include/Navbar.php");

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
    <title>Home</title>
  </head>
  <body>
    <style>
    /*------- Styling--------------------*/
    .post-box{border: 2px solid #4267B2; background-color: white; padding: 12px; border-radius:30px;}
	  .Posted{font-size: 10px;}
	  .content{font-size: 20px;}
    </style>
    <!----------------------------------------------------------------------------------------------------------------->
    <!--Start Coding-->
	<hr style="margin-top: 60px;">
    <div class="mt-3">
      <?php echo get_posts(); ?>
    </div>
    <!----------------------------------------------------------------------------------------------------------------->
    <script>//---JavaScript------------------
    </script>
  </body>
</html>

<?php
function get_posts()
{
	global $DB_Connect;

	$get_posts = "SELECT * FROM posts ORDER BY 1 DESC";
	$run_posts = mysqli_query($DB_Connect, $get_posts);
	while($row_posts = mysqli_fetch_array($run_posts))
	{
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$content = substr($row_posts['post_content'], 0,5000);
		$the_file_name = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		$user = "SELECT * FROM users WHERE user_id='$user_id' AND post='Yes'";
		$run_user = mysqli_query($DB_Connect,$user);
		$row_user = mysqli_fetch_array($run_user);

		$first_name = $row_user['first_name'];
		$last_name = $row_user['last_name'];
		$profile_pic = $row_user['profile_pic'];

		//now displaying posts from database

		if(strlen($content) >= 1 && strlen($the_file_name) >= 1)
		{
			echo"
				<div class='container col-sm-7 mt-3'>
					<div class='post-box'>
						<img src='../Images/Profile_Pics/$profile_pic' class='rounded-circle' title='User Profile Picture' width='100px' height='100px'>
						<h2 style='display: inline;'>$first_name $last_name</h2>
						<p class='Posted'>Posted :- $post_date</p>
						<p class='content'>$content</p>
						<img src='../Images/Posts/$the_file_name' style='height:440px; padding-top: 1px; width: 100%;'>
					  <a href='Action/Comment_post.php?post_id=$post_id' style='border: 1px solid green; background-color: white; color: green; text-align: center; padding: 3px; border-radius: 20px; text-decoration: none; display: inline;';>Comment</a>
					</div>
				</div>
			";
		}



		elseif($content==null && strlen($the_file_name) >= 1)
		{
			echo"
				<div class='container col-sm-7 mt-3'>
					<div class='post-box'>
						<img src='../Images/Profile_Pics/$profile_pic' class='rounded-circle' title='User Profile Picture' width='100px' height='100px'>
						<h2 style='display: inline;'>$first_name $last_name</h2>
						<p class='Posted'>Posted :- $post_date</p>
						<img src='../Images/Posts/$the_file_name' style='height:440px; padding-top: 1px; width: 100%;'>
						<a href='Action/Comment_post.php?post_id=$post_id' style='border: 1px solid green; background-color: white; color: green; text-align: center; padding: 3px; border-radius: 20px; text-decoration: none; display: inline;';>Comment</a>
					</div>
				</div>
			";
		}

		

		elseif(!($content==null))
		{
			echo"
				<div class='container col-sm-7 mt-3'>
					<div class='post-box'>
						<img src='../Images/Profile_Pics/$profile_pic' class='rounded-circle' title='User Profile Picture' width='100px' height='100px'>
						<h2 style='display: inline;'>$first_name $last_name</h2>
						<p class='Posted'>Posted :- $post_date</p>
						<p class='content'>$content</p>
						<a href='Action/Comment_post.php?post_id=$post_id' style='border: 1px solid green; background-color: white; color: green; text-align: center; padding: 3px; border-radius: 20px; text-decoration: none; display: inline;';>Comment</a>
					</div>
				</div>
			";
		}


		
		else
		{
			echo "<script>alert('Error')</script>";
			exit();
		}
	}
}
?>