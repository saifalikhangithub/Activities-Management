<?php

include_once("../../Include/DB_Connection.php");

if(isset($_GET['post_id']))
{
	$post_id = $_GET['post_id'];
	$delete_post = "DELETE FROM posts WHERE post_id='$post_id'";
	$run_delete = mysqli_query($DB_Connect, $delete_post);
	if($run_delete)
	{
		echo"<script>alert('Your Post Deleted Successfully')</script>";
		echo"<script>window.open('../Profile.php', '_self')</script>";
	}
}

?>