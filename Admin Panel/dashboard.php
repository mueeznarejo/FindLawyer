<?php
	include_once('inc/top.php');
	include_once('inc/nav.php');
?>
		
		<!------Start of Main Section-------->
		<div class="container-fluid">
			<div class="row">
				<?php include_once('inc/sidebar.php'); ?>
				<div class="col-md-9">
					<h1 class="main-head"><span class="fa fa-tachometer"></span> Dashboard <small style="color:lightgrey;">Statistics overview</small></h1><hr/>
					<!-----BreadCum---->
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
						<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
					  </ol>
					</nav>
					<!----Start of overview---->
					<div class="row">
						<div class="col-md-4" >
								<div class="card" style="border:none; width:17em; margin:auto; box-shadow:0px;">
									<!-----Card-header---->
									<div class="card-header text-light" style="background-color:#1A5276;">
										<!---Inner Coloumns--->
										
										<div class="row">
											<div class="col-md-3" >
											<i class="fa fa-users fa-3x "></i>
											</div>
											<!-- Select number of clients -->
											<?php
												$selectAllClient = "SELECT count(*) FROM `clients`";
												$runAllClient = mysqli_query($conn, $selectAllClient);
												$resultAllClient = mysqli_fetch_array($runAllClient);
											?>
											<div class="col-md-9">
												<div class=" text-right" style="font-size:14px;"><b><?php echo $resultAllClient[0]; ?></b></div>
												<div class=" text-right" style="font-size:14px;" ><h6 align="right"><b>Clients</b></h6></div>
											</div>
										</div>
									</div>
									<!-----Card-footer----->
									<div class="footer bg-white" style="padding:10px;">
										<a href="clients.php"  class="text-dark">View All Clients <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								
							
								</div>
						</div>
						<div class="col-md-4">
								<div class="card" style="border:none; margin:auto; width:17em; box-shadow:0px;">
									<!-----Card-header---->
									<div class="card-header text-light" style="background-color:#1A5276;">
										<!---Inner Coloumns--->
										
										<div class="row">
											<div class="col-md-3" >
											<i class="fa fa-gavel fa-3x "></i>
											</div>
											<!-- Select number of Lawyers -->
											<?php
												$selectAllLawyer = "SELECT count(*) FROM `lawyers`";
												$runAllLawyer = mysqli_query($conn, $selectAllLawyer);
												$resultAllLawyer = mysqli_fetch_array($runAllLawyer);
											?>
											<div class="col-md-9">
												<div class=" text-right" style="font-size:14px;"><b><?php echo $resultAllLawyer[0]; ?></b></div>
												<div class=" text-right" style="font-size:14px;" ><h6 align="right"><b>Lawyers</b></h6></div>
											</div>
										</div>
									</div>
									<!-----Card-footer----->
									<div class="footer bg-white" style="padding:10px;">
										<a href="lawyers.php"  class="text-dark">View All Lawyers <i class="fa fa-arrow-circle-right"></i></a>
									</div>
							
							
								</div>
						</div>
						<div class="col-md-4">
								<div class="card" style="border:none; margin:auto; width:17em; box-shadow:0px;">
									<!-----Card-header---->
									<div class="card-header text-light" style="background-color:#1A5276;">
										<!---Inner Coloumns--->
										
										<div class="row">
											<div class="col-md-3" >
											<i class="fa fa-envelope fa-3x "></i>
											</div>
											<!-- Select number of Lawyers -->
											<?php
												$selectAdminMsg = "SELECT count(*) FROM `admin_msg`";
												$runAdminMsg = mysqli_query($conn, $selectAdminMsg);
												$resultAdminMsg = mysqli_fetch_array($runAdminMsg);
											?>
											<div class="col-md-9">
												<div class=" text-right" style="font-size:14px;"><b><?php echo $resultAdminMsg[0] ?></b></div>
												<div class=" text-right" style="font-size:14px;" ><h6 align="right"><b>New Messages</b></h6></div>
											</div>
										</div>
									</div>
									<!-----Card-footer----->
									<div class="footer bg-white" style="padding:10px;">
										<a href="messages.php"  class="text-dark">View All Messages <i class="fa fa-arrow-circle-right"></i></a>
									</div>
							
							
								</div>
						</div>
					</div>
					<!----End of overview---->
					<!---Start of New Clients---->
					<hr/>
						<h4>New Clients</h4>
					<hr/>
					<table class="table table-hover table-striped ">
						<tr>
							<th>Sr#</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
						</tr>
						<!-- Select new clients -->
						<?php
							$a = 1;
							$selectClient = "SELECT * FROM `clients` ORDER BY `user_id` DESC LIMIT 5";
							$runClient = mysqli_query($conn, $selectClient);
							while($rowClient = mysqli_fetch_array($runClient)){
								$client_name = $rowClient['name'];
								$client_caste = $rowClient['caste'];
								$client_email = $rowClient['email'];
							?>
						<tr>
							<td><?php echo $a++; ?></td>
							<td><?php echo $client_name; ?></td>
							<td><?php echo $client_caste; ?></td>
							<td><?php echo $client_email; ?></td>
						</tr>
							<?php
							}
						?>
					</table>
					<a href="clients.php" class="btn text-light" style="background-color:#1A5276;">View More</a>
					<hr/>
					<!---End of New Clients---->
					
					
					<!---Start of New Lawyers---->
					<hr/>
						<h4>New Lawyers</h4>
					<hr/>
					<table class="table table-hover table-striped">
						<tr>
							<th>Sr#</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Specilized</th>
							<th>Court</th>
							
						</tr>
						<?php
							$a = 1;
							$selectLawyer = "SELECT * FROM `lawyers` ORDER BY `user_id` DESC LIMIT 5";
							$runLawyer = mysqli_query($conn, $selectLawyer);
							while($rowLawyer = mysqli_fetch_array($runLawyer)){
								$lawyer_name = $rowLawyer['name'];
								$lawyer_caste = $rowLawyer['caste'];
								$lawyer_email = $rowLawyer['email'];
								$lawyer_specialty = $rowLawyer['specialty'];
								$specialty = explode(', ', $lawyer_specialty);
								$lawyer_court = $rowLawyer['court'];
							?>
						<tr>
							<td><?php echo $a++; ?></td>
							<td><?php echo $lawyer_name; ?></td>
							<td><?php echo $lawyer_caste; ?></td>
							<td><?php echo $lawyer_email; ?></td>
							<td><?php echo $specialty[0]; ?></td>
							<td><?php echo $lawyer_court; ?></td>
						</tr>
							<?php
							}
						?>
					</table>
					<a href="lawyers.php" class="btn text-light" style="background-color:#1A5276;">View More</a>
					<hr/>
					<!---End of New Lawyers---->
					
					
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
					
						</tr>
						<?php
							$a = 1;
							$selectMsg = "SELECT * FROM `admin_msg` ORDER BY `msg_id` DESC LIMIT 5";
							$runMsg = mysqli_query($conn, $selectMsg);
							while($rowMsg = mysqli_fetch_array($runMsg)){
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
						</tr>
							<?php
							}
						?>
					</table>
					<a href="messages.php" class="btn text-light" style="background-color:#1A5276;">View More</a>
					<hr/>
					<!---End of New Messages---->
				</div>
			</div>
		</div>
		<!------End of Main Section-------->
<?php
	include_once('inc/footer.php');
?> 
