<?php

session_start();

include('db/connection.php');

// if ($_SESSION['email']==true) {
  
// }

// else{
//   header('location:admin_login.php');
// }

if (isset($_POST['submit'])) {
    
    $title=mysqli_real_escape_string($con,$_POST['title']);
    $title_description=mysqli_real_escape_string($con,$_POST['title_description']);
    $description=mysqli_real_escape_string($con,$_POST['description']);
    $added_on=$_POST['date'];
    $thumbnail=($_FILES['thumbnail']['name']);
    $added_by=$_SESSION['name'];
  
    move_uploaded_file($_FILES['thumbnail']['tmp_name'],"../images/$thumbnail");

    $query1=mysqli_query($con,"insert into posts(title,title_description,description,added_on,thumbnail,added_by)
      values('$title','$title_description','$description','$added_on','$thumbnail',
      '$added_by')")or die(mysqli_error($con));

    if ($query1) {
      
        echo "<script> alert('Post Uploaded Successfully !') </script>";
        echo "<script> window.location='http://localhost/BlogWebsite2/Members/posts.php'; </script>";
 
    }

    else{
        echo "<script> alert('Please Try Again !') </script>";

    }

}

$page='product';

include('header.php');

?>

  <div style="margin-left: 17%; width: 75%">
    <ul class="breadcrumb">
        <li class="breadcrumb-item active"><a href="home.php">Home</a></li>

        <li class="breadcrumb-item active">Add Post</li>
    </ul>
  </div>

<div style="width: 75%; margin-left: 21%; margin-bottom: 15%;">
  
<form action="add_post.php" style="margin-top: -2%;" method="post" enctype="multipart/form-data">

  <br>

  <h1 style="color: #1a75ff;">Add Post</h1>
  <br>
  
  <div class="form-group">
    <label for="title"><b>Title:</b></label>
    <input type="text" class="form-control" placeholder="Title..." name="title" id="title" autocomplete="off" required>
  </div>

  <div class="form-group">
    <label for="title_description"><b>Title Description:</b></label>
    <input type="text" class="form-control" placeholder="Title Description..." name="title_description" id="title_description" autocomplete="off" required>
  </div>
  
  <div class="form-group">
  <label for="description"><b>Description:</b></label>
  <textarea class="form-control" rows="5" placeholder="Description..." name="description" id="description" required></textarea>
  </div>

  <div class="form-group">
    <label for="email"><b>Date:</b></label>
    <input type="date" class="form-control" name="date" id="date">
  </div>

  <div class="form-group">
    <label for="email"><b>Thumbnail:</b></label>
    <input type="file" class="form-control img-thumbnail" name="thumbnail" id="email">
  </div>
      <div class="form-group">
        <label for="admin">Admin</label>
        <input type="text" class="form-control" disabled value="
        <?php echo $_SESSION['name'];?>">
      </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Add Post">
</form>

</div>

<?php

include('footer.php');

?>

