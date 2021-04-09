<?php

	include('db/connection.php');

	if(isset($_GET['id'])){
		$id = mysqli_real_escape_string($con, $_GET['id']);

		$deleteUser = "update user set is_active=0, is_delete=1 where id='$id'";

		$deleteUserResult = mysqli_query($con, $deleteUser);

		if ($deleteUserResult) {
	
			echo "<script> alert('User Successfully Deleted') </script>";
			echo "<script> window.location='http://localhost/BlogWebsite2/members/users.php'; </script>";
		}

		else{
			echo "<script> alert('Please Try Again') </script>";
		}
	}

?>