<?php

session_start();

include('db/connection.php');

// if ($_SESSION['email']==true) {
  
// }

// else{
//   header('location:admin_login.php');
// }

$getId = "";

if (isset($_POST['submit'])) {

    if(isset($_GET['id'])){
      $getId = mysqli_real_escape_string($con, $_GET['id']);
    }
    
    $title=mysqli_real_escape_string($con,$_POST['title']);
    $title_description=mysqli_real_escape_string($con,$_POST['title_description']);
    $description=mysqli_real_escape_string($con,$_POST['description']);
    $added_on=$_POST['date'];
    $thumbnail=($_FILES['thumbnail']['name']);
    $added_by=$_SESSION['name'];
  
    move_uploaded_file($_FILES['thumbnail']['tmp_name'],"../images/$thumbnail");

    $getPost = "update posts set title='$title' , description='$description' , added_on='$added_on' , thumbnail='$thumbnail' , added_by='$added_by' where id='$getId' ";

    $getPostResult=mysqli_query($con,$getPost)or die(mysqli_error($con));

    if ($getPostResult) {
      
        echo "<script> alert('Post Updated Successfully !') </script>";
        echo "<script> window.location='http://localhost/BlogWebsite2/Members/posts.php'; </script>";
 
    }

    else{
        echo "<script> alert('Please Try Again !') </script>";

    }

}

if(isset($_GET['id'])){
  $id = mysqli_real_escape_string($con, $_GET['id']);

  $getPost = "select * from posts where id='$id'";

  $getPostResult = mysqli_query($con, $getPost);

  while($row = mysqli_fetch_assoc($getPostResult)){
    $pid = $row['id'];
    $ptitle = $row['title'];
    $ptitle_description = $row['title_description'];
    $pdescription = $row['description'];
    $padded_on = $row['added_on'];
    $pthumbnail = $row['thumbnail'];
    $padded_by = $row['added_by'];
  }
}

include('header.php');

?>

  <div style="margin-left: 17%; width: 75%">
    <ul class="breadcrumb">
        <li class="breadcrumb-item active"><a href="home.php">Home</a></li>

        <li class="breadcrumb-item active">Update Post</li>
    </ul>
  </div>

<div style="width: 75%; margin-left: 21%; margin-bottom: 15%;">
  
<form action="edit_post.php" style="margin-top: -2%;" method="post" enctype="multipart/form-data">

  <br>

  <h1 style="color: #1a75ff;">Update Post</h1>
  <br>
  
  <div class="form-group">
    <label for="title"><b>Title:</b></label>
    <input type="text" class="form-control" placeholder="Title..." name="title" id="title" autocomplete="off" value="<?php echo $ptitle; ?>" required>
  </div>

  <div class="form-group">
    <label for="title_description"><b>Title Description:</b></label>
    <input type="text" class="form-control" placeholder="Title Description..." name="title_description" id="title_description" autocomplete="off" value="<?php echo $ptitle_description; ?>" required>
  </div>
  
  <div class="form-group">
  <label for="description"><b>Description:</b></label>
  <textarea class="form-control" rows="5" placeholder="Description..." name="description" id="description" required><?php echo $pdescription; ?></textarea>
  </div>

  <div class="form-group">
    <label for="email"><b>Date:</b></label>
    <input type="date" class="form-control" name="date" id="date" value="<?php echo $padded_on ?>">
  </div>

  <div class="form-group">
    <label for="email"><b>Thumbnail:</b></label>
    <input type="file" class="form-control img-thumbnail" name="thumbnail" id="email" value="<?php echo $pthumbnail; ?>">
    <img class="img img-thumbnail" src="../images/<?php echo $pthumbnail;?>" width="200" height="200">
  </div>
      <div class="form-group">
        <label for="admin">Admin</label>
        <input type="text" class="form-control" disabled value="
        <?php echo $padded_by;?>">
      </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Update Post">
</form>

</div>

<?php

include('footer.php');

?>

