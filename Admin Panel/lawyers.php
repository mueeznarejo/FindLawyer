<?php
	include_once('inc/top.php');
	include_once('inc/nav.php');
?>
		
		<!------Start of Main Section-------->
		<div class="container-fluid">
			<div class="row">
				<?php include_once('inc/sidebar.php'); ?>
				<div class="col-md-9">
					<h1 class="main-head"><span class="fa fa-gavel"></span> Lawyers <small style="color:lightgrey;">All Lawyers</small></h1><hr/>
					<!-----BreadCum---->
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
						<li class="breadcrumb-item active" aria-current="page">Dashboard </li>
						<li class="breadcrumb-item active" aria-current="page">Lawyers</li>
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
							<th>Specilized</th>
							<th>Court</th>
							<th>profile pic</th>
							<!-- <th>Update</th> -->
							<th>Delete</th>
						</tr>
						<?php
							$a = 1;
							$selectLawyer = "SELECT * FROM `lawyers` ORDER BY `user_id` DESC";
							$runLawyer = mysqli_query($conn, $selectLawyer);
							while($rowLawyer = mysqli_fetch_array($runLawyer)){
								$user_id = $rowLawyer['user_id'];
								$lawyer_name = $rowLawyer['name'];
								$lawyer_caste = $rowLawyer['caste'];
								$lawyer_email = $rowLawyer['email'];
								$lawyer_password = $rowLawyer['password'];
								$lawyer_specialty = $rowLawyer['specialty'];
								$specialty = explode(', ', $lawyer_specialty);
								$lawyer_court = $rowLawyer['court'];
								$profile_pic = $rowLawyer['profile_pic'];
							?>
						<tr>
							<td><?php echo $a++; ?></td>
							<td><?php echo $user_id; ?></td>
							<td><?php echo $lawyer_name; ?></td>
							<td><?php echo $lawyer_caste; ?></td>
							<td><?php echo $lawyer_email; ?></td>
							<td><?php echo $lawyer_password; ?></td>
							<td><?php echo $specialty[0]; ?></td>
							<td><?php echo $lawyer_court; ?></td>
							<td><img src="../uploads/profile/<?php echo $profile_pic; ?>" width="50px" height="50px" class="img img-responsive"/></td>	
							<!-- <td><a href=""><i class="fa fa-pencil text-success"></i></a></td> -->
							<td><a href="lawyers.php?delete=<?php echo $user_id; ?>" class="btn btn-sm rounded-0 btn-danger"><i class="fa fa-times text-white"></i></a></td>
						</tr>
							<?php
							}
							// Delete Message
							if (isset($_GET['delete'])) {
								$user_id = $_GET['delete'];
								$deleteMsg = "DELETE FROM `lawyers` WHERE `user_id` = '$user_id'";
								mysqli_query($conn, $deleteMsg);
								header('location: lawyers.php');
							}
						?>
						</tr>
					</table>
					<hr/>
					<!---End of New Lawyers---->
					
					
					
					
				</div>
			</div>
		</div>
		<!------End of Main Section-------->

<?php
	include_once('inc/footer.php');
?> 
