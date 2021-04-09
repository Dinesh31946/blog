<?php

	session_start();
	error_reporting(0);

	include('db/connection.php');
  include('header.php');
  
	if(isset($_POST['submit'])){
      $id  = mysqli_real_escape_string($con, $POST_['id']);
      $name = mysqli_real_escape_string($con, $_POST['name']);
      $role = mysqli_real_escape_string($con, $_POST['role']);
      
      if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($con, $_GET['id']);
      }

      $sql = "update user set name='$name', role='$role' where id='$id'";
      
      $result = mysqli_query($con, $sql);

      if(!$result){
         echo"<script> alert('Failed to update user') </script>";
      }else{
         echo"<script> alert('user updated successfully') </script>";
         header('location:users.php');
      }
   }

  if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($con, $_GET['id']);

    $getUser = "select * from user where id='$id'";

    $getUserResult = mysqli_query($con, $getUser);

    while($row = mysqli_fetch_assoc($getUserResult)){
      $uname = $row['name'];
      $urole = $row['role'];
    }
  }

	

?>

	<div style="margin-left: 17%; width: 75%">
       <ul class="breadcrumb">
          <li class="breadcrumb-item active"><a href="home.php">Home</a></li>

          <li class="breadcrumb-item active">Users</li>
       </ul>
  	</div>

  	<div class="container" style="margin-top: 78px;margin-left: 243px;width: 41%;">
      <form action="edit_user.php" method="post">
        <div>
          <button class="btn btn-primary btn-sm"><a href="users.php" class="text-light" style="text-decoration: none;">Back</a> </button>
        </div>
        <br>

        <h1 style="color: #1a75ff;">Update User</h1>
        <br>
        <div class="form-group">
          <label for="name">Username:</label>
          <input type="text" class="form-control" name="name" id="name" value="<?php echo $uname; ?>">
        </div>
        <div class="form-group">
          <label for="name">Role:</label>
          <select class="form-select" name="role" id="role">
            <option selected><?php echo $urole; ?></option>
            <option value="super_admin">Admin</option>
            <option value="guest_admin">Guest Admin</option>
          </select>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Update">
      </form>
    </div>
</div>