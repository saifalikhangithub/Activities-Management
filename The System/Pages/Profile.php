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
    <title><?php echo"$first_name $last_name";?></title>
  </head>
  <body>
    <style>
      /*------- Styling--------------------*/
      #content{resize: none; border-radius:50px; padding-left:20px; padding-right:20px; border:2px solid #4267B2}

      #upload_image_button{width: 120px; border-radius:20px; background-color: #4267B2; border-color: #4267B2; color: white;}
      #upload_image_button:hover{background-color: white; color: #4267B2;}

      #btn-post{width: 120px; border-radius:20px; background-color: #4267B2; border-color: #4267B2; color: white;}
      #btn-post:hover{background-color: white; color: #4267B2;}

	  .post-box{border: 2px solid #4267B2; background-color: white; padding: 12px; border-radius:30px;}
	  .Posted{font-size: 10px;}
	  .content{font-size: 20px;}

      input[type="file"]{display: none;}
    </style>
    <!----------------------------------------------------------------------------------------------------------------->
    <!--Start Coding-->
	<hr style="margin-top: 60px;">
    <div class="container col-sm-7 text-center mt-3">
      <form action="Profile.php?user_id=<?php echo $user_id; ?>" method="post" id="form" enctype="multipart/form-data">
        <textarea class="form-control" id="content" rows="3" name="content" title="You Can Write Only 5000 or Less Than 5000 Letters" placeholder="Write Hear Whatever You Want To Post..."></textarea>
            <label class="btn btn-success mt-2" id="upload_image_button" title="Select Image For Post">
              Select Image
              <input type="file" accept="image/jpg, image/jpeg, image/png" name="upload_image" size="30" />
            </label>
			      <input type="submit" value="Post" class="btn btn-outline-primary mt-2" id="btn-post" name="btn-post" title="Click For Post">
        </form>
    </div><hr>
    <?php insertPost(); ?>
    <?php echo get_posts(); ?>
    <!----------------------------------------------------------------------------------------------------------------->
    <script>//---JavaScript------------------
    </script>
  </body>
</html>

<?php 
function insertPost()
{
	if(isset($_POST['btn-post']))
	{ 
		global $DB_Connect;
		global $user_id;

		$content = htmlentities(mysqli_real_escape_string($DB_Connect, $_POST['content']));
		$file_name = $_FILES['upload_image']['name'];
		$file_tmp_name = $_FILES['upload_image']['tmp_name'];
		$file_size = $_FILES['upload_image']['size'];
		$file_type = $_FILES['upload_image']['type'];
		$file_error = $_FILES['upload_image']['error'];

		$file_ext = explode('.', $file_name);
		$file_actual_ext = strtolower(end($file_ext));
		$allowed = array('jpg', 'jpeg', 'png');

		if($file_name=='' && $content == '')
		{
			echo "<script>alert('Sorry, Please Select Image Or Write Some Text Then Click On Post Button')</script>";
			echo "<script>window.open('Profile.php?user_id=$user_id' , '_self')</script>";
			exit();
		}

		if(strlen($content) > 5000)
		{
			echo "<script>alert('Sorry, You Can Write Only 5000 or Less Than 5000 Letters !')</script>";
			echo "<script>window.open('Profile.php?user_id=$user_id' , '_self')</script>";
			exit();
		}
		else
		{
			if(strlen($file_name) >= 1 && strlen($content) >= 1)	//---> Image With Text
			{
				if(in_array($file_actual_ext, $allowed))
        		{
					if($file_error===0)
					{
						if($file_size < 10485760) // (Byte To MB) (10485760 Byte - 10 mb)
            			{
							$file_name_new = $file_name.uniqid('', true).".".$file_actual_ext;
							$file_destination = "../Images/Posts/".$file_name_new;
							move_uploaded_file($file_tmp_name, $file_destination);
							$insert = "INSERT INTO posts (user_id, post_content, upload_image, post_date) VALUES('$user_id', '$content', '$file_name_new', NOW())";
							$run = mysqli_query($DB_Connect, $insert);
							if($run)
							{
								echo "<script>alert('Your Post Uploaded Successfully')</script>";
								echo "<script>window.open('Profile.php?user_id=$user_id' , '_self')</script>";
								$update = "update users set post='Yes' where user_id='$user_id'";
								$run_update = mysqli_query($DB_Connect, $update);
								exit();
							}
						}
						else
						{
							echo"<script>alert('Your File Size Is Too Big. Your File Size Should Be Less Than 10mb')</script>";
							echo "<script>window.open('Profile.php?user_id=$user_id' , '_self')</script>";
							exit();
						}
					}
					else
					{
						echo"<script>alert('Error')</script>";
						echo "<script>window.open('Profile.php?user_id=$user_id' , '_self')</script>";
						exit();
					}
				}
				else
				{
					echo"<script>alert('Sorry! You Can Not Upload This Types Of File')</script>";
					echo "<script>window.open('Profile.php?user_id=$user_id' , '_self')</script>";
					exit();
				}
				exit();
			}
			

		 //--------------------------


			elseif($content==null)	//---> Only Image
			{
				if(in_array($file_actual_ext, $allowed))
        		{
					if($file_error===0)
					{
						if($file_size < 10485760) // (Byte To MB) (10485760 Byte - 10 mb)
            			{
							$file_name_new = $file_name.uniqid('', true).".".$file_actual_ext;
							$file_destination = "../Images/Posts/".$file_name_new;
							move_uploaded_file($file_tmp_name, $file_destination);
							$insert = "INSERT INTO posts (user_id, post_content, upload_image, post_date) VALUES('$user_id', '$content', '$file_name_new', NOW())";
							$run = mysqli_query($DB_Connect, $insert);
							if($run)
							{
								echo "<script>alert('Your Post Uploaded Successfully')</script>";
								echo "<script>window.open('Profile.php?user_id=$user_id' , '_self')</script>";
								$update = "update users set post='Yes' where user_id='$user_id'";
								$run_update = mysqli_query($DB_Connect, $update);
								exit();
							}
						}
						else
						{
							echo"<script>alert('Your File Size Is Too Big. Your File Size Should Be Less Than 10mb')</script>";
							echo "<script>window.open('Profile.php?user_id=$user_id' , '_self')</script>";
							exit();
						}
					}
					else
					{
						echo"<script>alert('Error')</script>";
						echo "<script>window.open('Profile.php?user_id=$user_id' , '_self')</script>";
						exit();
					}
				}
				else
				{
					echo"<script>alert('Sorry! You Can Not Upload This Types Of File')</script>";
					echo "<script>window.open('Profile.php?user_id=$user_id' , '_self')</script>";
					exit();
				}
				exit();
			}


		 //--------------------------


			elseif(!($content==null))
			{
				$insert = "INSERT INTO posts (user_id, post_content, post_date) VALUES ('$user_id', '$content', NOW())";
				$run = mysqli_query($DB_Connect, $insert);
				if($run)
				{
					echo "<script>alert('Your Post Uploaded Successfully')</script>";
					echo "<script>window.open('Profile.php?user_id=$user_id' , '_self')</script>";
					$update = "update users set post='Yes' where user_id='$user_id'";
					$run_update = mysqli_query($DB_Connect, $update);
					exit();
				}
				exit();
			}


		 //--------------------------


			else
			{
				echo "<script>alert('Error')</script>";
				exit();
			}
		}
	}	
}
?>



<?php
function get_posts()
{
	global $DB_Connect;
	global $user_id;
	$get_posts = "SELECT * FROM posts WHERE user_id='$user_id' ORDER BY 1 DESC";

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


						<!-- Button trigger modal -->
							<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#delete-text_with_image-post'>
								Delete
							</button>

							<!-- Modal -->
							<div class='modal fade' id='delete-text_with_image-post' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
								<div class='modal-dialog'>
									<div class='modal-content'>
									<div class='modal-header'>
										<h5 class='modal-title' id='exampleModalLabel'>Delete Post</h5>
										<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
									</div>
									<div class='modal-body'>
										Are You Sure You Want To Delete This Post
									</div>
									<div class='modal-footer'>
										<a href='Action/delete_post.php?post_id=$post_id'><button type='button' class='btn btn-danger'>Delete</button></a>
									</div>
									</div>
								</div>
							</div>


						<a href='Action/Edit_post.php?post_id=$post_id' style='border: 1px solid blue; background-color: white; color: blue; text-align: center; padding: 3px; border-radius: 20px; text-decoration: none; display: inline;';>Edit</a>
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


						<!-- Button trigger modal -->
							<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#delete-image-only-post'>
								Delete
							</button>

							<!-- Modal -->
							<div class='modal fade' id='delete-image-only-post' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
								<div class='modal-dialog'>
									<div class='modal-content'>
									<div class='modal-header'>
										<h5 class='modal-title' id='exampleModalLabel'>Delete Post</h5>
										<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
									</div>
									<div class='modal-body'>
										Are You Sure You Want To Delete This Post
									</div>
									<div class='modal-footer'>
										<a href='Action/delete_post.php?post_id=$post_id'><button type='button' class='btn btn-danger'>Delete</button></a>
									</div>
									</div>
								</div>
							</div>


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


						<!-- Button trigger modal -->
							<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#delete-text-only-post'>
								Delete
							</button>

							<!-- Modal -->
							<div class='modal fade' id='delete-text-only-post' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
								<div class='modal-dialog'>
									<div class='modal-content'>
									<div class='modal-header'>
										<h5 class='modal-title' id='exampleModalLabel'>Delete Post</h5>
										<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
									</div>
									<div class='modal-body'>
										Are You Sure You Want To Delete This Post
									</div>
									<div class='modal-footer'>
										<a href='Action/delete_post.php?post_id=$post_id'><button type='button' class='btn btn-danger'>Delete</button></a>
									</div>
									</div>
								</div>
							</div>


						<a href='Action/Edit_post.php?post_id=$post_id' style='border: 1px solid blue; background-color: white; color: blue; text-align: center; padding: 3px; border-radius: 20px; text-decoration: none; display: inline;';>Edit</a>
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
	//include("pagination.php");
}
?>