<?php

session_start();
session_regenerate_id(true);
ob_start();

// Putting session in variable of logged in person
if(isset($_SESSION['admin_id'])){
  $admin_id = $_SESSION['admin_id'];
}

?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<!-- Required meta tags -->
			<meta charset="utf-8">
		
		<!---Required meta tags----->
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Mobile Specific Meta -->
			<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Always force latest IE rendering engine -->
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<!-- Meta Keyword -->
			<meta name="keywords" content="one page, business template, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
	   
	   <!-- meta character set -->
			<meta charset="utf-8">
		
		<title>Admin Panel | Dashboard</title>
		
		<!-- CSS -->
		
		<!-- Google Fonts -->
		<link href="" rel="stylesheet">
		
		<!-- Fav icon -->
		<link rel="shortcut icon" href=""/>
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		
		<!-- Style CSS -->
		<link rel="stylesheet" href="css/style.css"/>
		
		<!-- Animate CSS -->
		<link rel="stylesheet" href="css/animate.css"/>
		
		<!--Font Awesome  icon -->
		<link rel="stylesheet" href="css/font-awesome.css"/>
	</head>
	<body>
		<?php    
	      if(isset($_SESSION['message'])){
	        echo $_SESSION['message'];
	        unset($_SESSION['message']);
	      }
	    ?>  
		<!----Start of Login Form------>
		<div class="container">
			<div class="Login-form-div">
				<center>
					<div class="card login-card animated fadeInDown" style="width:20em;">
						<div class="card-body">
							<h3 class="card-title">Sign In</h3>
						
							<div class="container start-form">
								<!--Starting of Form-->
								<form action="inc/login.php" method="POST">
									<div class="input-group">
										<!---Username--->
										<input type="username" name="username" placeholder="Username"  required="required" class="form-control"/>
									</div>
									
									<div class="input-group">
										<!--Passowrd--->
										<input type="password" name="password" placeholder="Password" required="required" class="form-control"/>
									</div>
									
									<div class="input-group">
										<!--Passowrd--->
										<input type="submit" value="Log in" name="submit_btn" class="submit_btn form-control"/>
									</div>
								</form>
							
								
							</div>
						</div>
					</div>
				</center>
			</div>
		</div>
		<!----End of Login Form----->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery.js" ></script>
	<script src="js/popper.min.js" ></script>
	<script src="js/bootstrap.min.js" ></script>
	</body>
</html>  
