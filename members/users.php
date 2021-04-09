<?php

	session_start();
	error_reporting(0);

	include('db/connection.php');

	$sql = "select * from user where is_active=1 order by name asc";

  $result = mysqli_query($con, $sql);

  $page = 'user';

	include('header.php');

?>

	<div style="margin-left: 17%; width: 75%">
       <ul class="breadcrumb">
          <li class="breadcrumb-item active"><a href="home.php">Home</a></li>

          <li class="breadcrumb-item active">Users</li>
       </ul>
  	</div>

  	<div class="content" style="margin-top: 78px;margin-left: 243px;width: 77%;">
   		<table class="table table-hover">
   			<thead>
   				<tr>
   					<td class="font-weight-bold">ID</td>
   					<td class="font-weight-bold">Name</td>
   					<td class="font-weight-bold">Role</td>
   					<td class="font-weight-bold">Action</td>
   				</tr>
   			</thead>
   			 <tbody>
   				<?php 
                  while ($row = mysqli_fetch_assoc($result)){
               v?>
               <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo $row['role'] ?></td>
                   <td>
                      <a href="edit_user.php?id=<?php echo $row['id']?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                      <a href="delete_user.php?id=<?php echo $row['id']?>" data-toggle="tooltip" data-placement="right" title="Delete"><i class="far fa-trash-alt text-danger"></i></a>
                   </td>
               </tr>
               <?php }?>
   			</tbody> 
   		</table>
   	</div>
</div>