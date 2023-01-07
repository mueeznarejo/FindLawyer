<?php
	include_once('inc/top.php');
	include_once('inc/nav.php');
?>
		<!------Start of Main Section-------->
		<div class="container-fluid">
			<div class="row">
				<?php include_once('inc/sidebar.php'); ?>
				<div class="col-md-9">
					<h1 class="main-head"><span class="fa fa-users"></span> Clients <small style="color:lightgrey;">All Clients</small></h1><hr/>
					<!-----BreadCum---->
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
						<li class="breadcrumb-item active" aria-current="page">Dashboard </li>
						<li class="breadcrumb-item active" aria-current="page">Clients</li>
					  </ol>
					</nav>
					
					<!---Start of New Clients---->
					<hr/>
					<table class="table table-hover table-striped table-responsive">
						<tr>
							<th>Sr#</th>
							<th>User_id</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Password</th>
							<th>profile pic</th>
							<!-- <th>Update</th> -->
							<th>Delete</th>
						</tr>
						<!-- Select new clients -->
						<?php
							$a = 1;
							$selectClient = "SELECT * FROM `clients` ORDER BY `user_id` DESC";
							$runClient = mysqli_query($conn, $selectClient);
							while($rowClient = mysqli_fetch_array($runClient)){
								$user_id = $rowClient['user_id'];
								$client_name = $rowClient['name'];
								$client_caste = $rowClient['caste'];
								$client_email = $rowClient['email'];
								$client_password = $rowClient['password'];
								$profile_pic = $rowClient['profile_pic'];
							?>
						<tr>
							<td><?php echo $a++; ?></td>
							<td><?php echo $user_id; ?></td>
							<td><?php echo $client_name; ?></td>
							<td><?php echo $client_caste; ?></td>
							<td><?php echo $client_email; ?></td>
							<td><?php echo $client_password; ?></td>
							<td><img src="../uploads/profile/<?php echo $profile_pic; ?>" width="50px" height="50px" class="img img-responsive"/></td>
							<!-- <td><a href=""><i class="fa fa-pencil text-success"></i></a></td> -->
							<td><a href="clients.php?delete=<?php echo $user_id; ?>" class="btn btn-sm rounded-0 btn-danger"><i class="fa fa-times text-white"></i></a></td>
						</tr>
							<?php
							}
							// Delete Message
							if (isset($_GET['delete'])) {
								$user_id = $_GET['delete'];
								$deleteMsg = "DELETE FROM `clients` WHERE `user_id` = '$user_id'";
								mysqli_query($conn, $deleteMsg);
								header('location: clients.php');
							}
						?>
					</table>
					<hr/>
					<!---End of New Clients---->
					
					
					
				</div>
			</div>
		</div>
		<!------End of Main Section-------->
		
<?php
	include_once('inc/footer.php');
?> 
