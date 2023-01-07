<?php
	include_once('inc/top.php');
	include_once('inc/nav.php');
?>

		<!------Start of Main Section-------->
		<div class="container-fluid">
			<div class="row">
				<?php include_once('inc/sidebar.php'); ?>
				<div class="col-md-9">
					<h1 class="main-head"><span class="fa fa-envelope"></span> Admin Messages <small style="color:lightgrey;">All Messages</small></h1><hr/>
					<!-----BreadCum---->
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
						<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
						<li class="breadcrumb-item active" aria-current="page">Messages</li>
					  </ol>
					</nav>
					
					
					<!---Start of New Messags---->
					<hr/>
						<h4>New Messages</h4>
					<hr/>
					<table class="table table-hover table-striped">

						<tr>
							<th>Sr#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Subject</th>
							<th>Message</th>
							<th>Delete</th>
						</tr>
						<?php
							$a = 1;
							$selectMsg = "SELECT * FROM `admin_msg` ORDER BY `msg_id` DESC LIMIT 5";
							$runMsg = mysqli_query($conn, $selectMsg);
							while($rowMsg = mysqli_fetch_array($runMsg)){
								$msg_id = $rowMsg['msg_id'];
								$name = $rowMsg['name'];
								$email = $rowMsg['email'];
								$subject = $rowMsg['subject'];
								$msg = $rowMsg['msg'];
							?>
						<tr>
							<td><?php echo $a++; ?></td>
							<td><?php echo $name; ?></td>
							<td><?php echo $email; ?></td>
							<td><?php echo $subject; ?></td>
							<td><?php echo $msg; ?></td>
							<td><a href="messages.php?delete=<?php echo $msg_id; ?>" class="btn btn-sm rounded-0 btn-danger"><i class="fa fa-times text-white"></i></a></td>
						</tr>
							<?php
							}
							// Delete Message
							if (isset($_GET['delete'])) {
								$msg_id = $_GET['delete'];
								$deleteMsg = "DELETE FROM `admin_msg` WHERE `msg_id` = '$msg_id'";
								mysqli_query($conn, $deleteMsg);
								header('location: messages.php');
							}
						?>
					</table>
					<hr/>
					<!---End of New Messages---->
				</div>
			</div>
		</div>
		<!------End of Main Section-------->
		
<?php
	include_once('inc/footer.php');
?> 
