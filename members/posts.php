<?php

	session_start();
	error_reporting(0);

	include('db/connection.php');

	$sql = "select * from posts where is_active=1 order by title asc";
  
  $result = mysqli_query($con, $sql);

  $page = 'posts';

	include('header.php');

?>

	<div style="margin-left: 17%; width: 75%">
       <ul class="breadcrumb">
          <li class="breadcrumb-item active"><a href="home.php">Home</a></li>

          <li class="breadcrumb-item active">Posts</li>
       </ul>
  	</div>

  	<div class="content" style="margin-top: 78px;margin-left: 243px;width: 77%;">
   		<table class="table table-hover">
   			<thead>
   				<tr>
   					<td class="font-weight-bold">ID</td>
   					<td class="font-weight-bold">Title</td>
   					<td class="font-weight-bold">Title Description</td>
   					<td class="font-weight-bold">Description</td>
            <td class="font-weight-bold">Image</td>
            <td class="font-weight-bold">Author</td>
            <td class="font-weight-bold">Added On</td>
            <td class="font-weight-bold">Action</td>
   				</tr>
   			</thead>
   			 <tbody>
   				<?php 
                  while ($row = mysqli_fetch_assoc($result)){
               ?>
               <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td><?php echo $row['title'] ?></td>
                  <td><?php echo $row['title_description'] ?></td>
                  <td><?php echo $row['description'] ?></td>
                  <td><img class="img img-thumbnail" src="../images/<?php echo $row['thumbnail'];?>"></td>
                  <td><?php echo $row['added_by'] ?></td>
                  <td><?php echo $row['added_on'] ?></td>
                   <td>
                      <a href="edit_post.php?id=<?php echo $row['id']?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                      <a href="delete_post.php?id=<?php echo $row['id']?>" data-toggle="tooltip" data-placement="right" title="Delete"><i class="far fa-trash-alt text-danger"></i></a>
                   </td>
               </tr>
               <?php }?>
   			</tbody> 
   		</table>
   	</div>
</div>