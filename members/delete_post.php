<?php

	include('db/connection.php');

	if(isset($_GET['id'])){
		$id = mysqli_real_escape_string($con, $_GET['id']);

		$deletePost = "update posts set is_active=0, is_delete=1 where id='$id'";

		$deletePostResult = mysqli_query($con, $deletePost);

		if ($deletePostResult) {
	
			echo "<script> alert('Post Successfully Deleted') </script>";
			echo "<script> window.location='http://localhost/BlogWebsite2/members/posts.php';
			</script>";
		}

		else{
			echo "<script> alert('Please Try Again') </script>";
			echo "<script> window.location='http://localhost/BlogWebsite2/members/posts.php';
			</script>";
		}
	}

?>