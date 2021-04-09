<?php


include('db/connection.php');

session_start();

if (isset($_POST['submit'])) {
	$name=mysqli_real_escape_string($con, $_POST['name']);
	$password=mysqli_real_escape_string($con, $_POST['password']);

	$sql = "select * from user where name='$name' AND password='$password'";

	$query=mysqli_query($con, $sql);

	while ($row = mysqli_fetch_assoc($query)) {
		$role = $row['role'];
	}

	if($query){
		if(mysqli_num_rows($query)>0){

			$_SESSION['Login']='yes';
			$_SESSION['name']=$name;
			$_SESSION['role']=$role;

			if($_SESSION['role'] == 'super_admin'){
				header('location:home.php');
			}else{
				header('location:../index.php');
			}
		}

		else{

			echo "<script> alert('Invalidate Credentials,Please Try Again') </script>";

		}

	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="includes/css/style.css">

</head>
<body>

	<div class="container">
		<div class="login_form border shadow justify-content-center align-items-center p-5">
			<form action="login.php" class="form_content" method="post">
				<h3 class="text-center">Login</h3>
			  	<div class="form-group">
			    	<label for="name	">Username:</label>
			    	<input type="text" name="name" class="form-control" id="email" required>
			  	</div>
			  	<div class="form-group">
			    	<label for="password">Password:</label>
			    	<input type="password" name="password" class="form-control" id="pwd" required>
			  	</div>
		  		<input type="submit" name="submit" class="btn btn-primary" value="Login">
			</form>
		</div>
	</div>

</body>
</html>

<?php



?>