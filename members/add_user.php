<?php

	session_start();
	error_reporting(0);

	include('db/connection.php');

	if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $role = mysqli_real_escape_string($con, $_POST['role']);

    $sql = "insert into user (name, password, role) values ('$name', '$password', '$role')";

    $result = mysqli_query($con, $sql);

    if($result){
      echo "<script> alert('User Successfully Added') </script>";
    }else{
      echo "<script> alert('Failed to add user, Please try again later') </script>";
    }
  }

	include('header.php');

?>

	<div style="margin-left: 17%; width: 75%">
       <ul class="breadcrumb">
          <li class="breadcrumb-item active"><a href="home.php">Home</a></li>

          <li class="breadcrumb-item active">Users</li>
       </ul>
  	</div>

  	<div class="container" style="margin-top: 78px;margin-left: 243px;width: 41%;">
      <form action="add_user.php" method="post">
        <div>
          <button class="btn btn-primary btn-sm" onclick="history.go(-1);">Back </button>
        </div>
        <br>

        <h1 style="color: #1a75ff;">Add User</h1>
        <br>
        <div class="form-group">
          <label for="name">Username:</label>
          <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group">
          <label for="name">Role:</label>
          <select class="form-select" name="role" id="role">
            <option selected>select Role</option>
            <option value="super_admin">Admin</option>
            <option value="guest_admin">Guest Admin</option>
          </select>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Add">
      </form>
    </div>
</div>