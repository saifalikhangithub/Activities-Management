<?php
session_start();

include_once("../../Include/DB_Connection.php"); 

if(!isset($_SESSION['email']))
{
  header("location: ../../Index.php");
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
    <link href="../../../B_v5.1/Bootstrap-5.1.3/CSS/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="" type="image/jpg" sizes="32x32">
    <title>Comments</title>
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
        <div class="container col-sm-7">
			<a href="../Home.php">Home</a>
			<?php single_post();?>
        </div>
    <!----------------------------------------------------------------------------------------------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> <!--Bootstarp.js CDN File With Popper.js CDN File-->
    <script>//---JavaScript------------------
    </script>
  </body>
</html>

<?php
function single_post()
{
	if(isset($_GET['post_id'])) 
	{
		global $DB_Connect;

		$get_id = $_GET['post_id'];
		$get_posts = "select * from posts where post_id='$get_id'";
		$run_posts = mysqli_query($DB_Connect, $get_posts);
		$row_posts = mysqli_fetch_array($run_posts);
			
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$content = $row_posts['post_content'];
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];
			
		$user = "select * from users where user_id='$user_id' AND post='Yes'";
			
		$run_user = mysqli_query($DB_Connect, $user);
		$row_user = mysqli_fetch_array($run_user);
			
		$first_name = $row_user['first_name'];
		$last_name = $row_user['last_name'];
		$profile_pic = $row_user['profile_pic'];
			
		$user_com = $_SESSION['email'];
			
		$get_com = "select * from users where email='$user_com'";
			
		$run_com = mysqli_query($DB_Connect, $get_com);
		$row_com = mysqli_fetch_array($run_com);
			
		$user_com_id = $row_com['user_id'];
		$first_com_name = $row_com['first_name'];
		$last_com_name = $row_com['last_name'];
		$user_com_name = $row_com['username'];
			
		if(isset($_GET['post_id']))
		{
			$post_id = $_GET['post_id'];
		}
		$get_posts = "select post_id from posts where post_id='$post_id'";
		$run_user = mysqli_query($DB_Connect, $get_posts);
			
		$post_id = $_GET['post_id'];
			
		$post = $_GET['post_id'];
		$get_user = "select * from posts where post_id='$post'";
		$run_user = mysqli_query($DB_Connect, $get_user);
		$row = mysqli_fetch_array($run_user);
			
		$p_id = $row['post_id'];
			
		if($p_id != $post_id)
		{
			echo "<script>alert('Error')</script>";
			echo "<script>window.open('home.php', '_self')</script>";
		}
		else
		{
            if(strlen($content) >= 1 && strlen($upload_image) >= 1)
            {
                echo"
                    <div class='container col-sm-7 mt-3'>
                        <div class='post-box'>
                            <img src='../../Images/Profile_Pics/$profile_pic' class='rounded-circle' title='User Profile Picture' width='100px' height='100px'>
                            <h2 style='display: inline;'>$first_name $last_name</h2>
                            <p class='Posted'>Posted :- $post_date</p>
                            <p class='content'>$content</p>
                            <img src='../../Images/Posts/$upload_image' style='height:440px; padding-top: 1px; width: 100%;'>
                        </div>
                    </div>
                ";
            }


            elseif($content==null && strlen($upload_image) >= 1)
            {
                echo"
                    <div class='container col-sm-7 mt-3'>
                        <div class='post-box'>
                            <img src='../../Images/Profile_Pics/$profile_pic' class='rounded-circle' title='User Profile Picture' width='100px' height='100px'>
                            <h2 style='display: inline;'>$first_name $last_name</h2>
                            <p class='Posted'>Posted :- $post_date</p>
                            <p class='content'>$content</p>
                            <img src='../../Images/Posts/$upload_image' style='height:440px; padding-top: 1px; width: 100%;'>
                        </div>
                    </div>
                ";
            }


            elseif(!($content==null))
            {
                echo"
                    <div class='container col-sm-7 mt-3'>
                        <div class='post-box'>
                            <img src='../../Images/Profile_Pics/$profile_pic' class='rounded-circle' title='User Profile Picture' width='100px' height='100px'>
                            <h2 style='display: inline;'>$first_name $last_name</h2>
                            <p class='Posted'>Posted :- $post_date</p>
                            <p class='content'>$content</p>
                        </div>
                    </div>
                ";
            }
	    }//else condition ending
            echo"
            	<div class=''>
				    <div class='panel panel-info'>
						<div class='panel-body'>
							<form action='' method='post' class='form-inline'>
								<textarea placeholder='Write Your Comment...' class='form-control' name='comment-txt' rows='2'></textarea>				
								<button name='comment'>Comment</button>
							</form>
						</div>
					</div>
				</div>
			    ";
			
                include("C.php");	


				if(isset($_POST['comment']))
				{
					$comment = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['comment-txt']));
					if($comment == null)
					{
						echo "<script>alert('Enter Your Comment')</script>";
						echo "<script>window.open('Comment_Post.php?post_id=$post_id', '_self')</script>";
					}
					else
					{
						$insert = "insert into comments (post_id,user_id,comment,comment_user,comment_date)
									values('$post_id','$user_com_id','$comment','$first_com_name $last_com_name',NOW())";
									
						$run = mysqli_query($DB_Connect, $insert);
						
						echo "<script>alert('Your Comment Added')</script>";
						echo "<script>window.open('Comment_Post.php?post_id=$post_id', '_self')</script>";
						
					}
		        }
	}
}
	
?>