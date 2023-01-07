<?php

session_start();
ob_start();

include_once('inc/db.php');
include_once('inc/functions.php');

// Putting session in variable of logged in person
if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
  $account_status = $_SESSION['account_status'];
}

?>
<!DOCTYPE html>
<!--
 * A Design by Mueez Aslam
 * Author: A.Mueez Aslam
 * Author URL: http://mueezaslam.wordpress.com
-->

<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="js"> <!--<![endif]-->
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--
	CSS
	============================================= -->
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- Main Stylesheet -->
   <link rel="stylesheet" type="text/css" href="css/style.css">
	 <!-- font awesome css -->
	 <link rel="stylesheet" type="text/css" href="css/font-awesome.css">

	<!-- Site Title -->
    <title>Lawyer</title>
  
  </head>
  <body class="bg-white">
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm navbar-light bg-white zindex-dropdown">
      <div class="container">
        <a class="navbar-brand" href="<?php if($account_status == 'lawyer'):echo '#'; else:echo 'index.php'; endif; ?>">Company Name</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse navbarCollapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <?php if(@$_SESSION['account_status'] != 'lawyer'): ?>
            <li class="nav-item <?php active('index.php'); ?>">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php endif; ?>
            <li class="nav-item <?php active('contact.php'); ?>">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item <?php active('ask.php'); ?>">
              <a class="nav-link" href="ask.php">Ask <i class="far fa-question-circle" aria-hidden="true"></i></a>
            </li>
            <?php if(!isset($_SESSION['user_id'])){ 
              ?>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-dark rounded-0" href="#" data-toggle="modal" data-target="#lawyerLogin">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-brown rounded-0" href="#" data-toggle="modal" data-target="#clientLogin">Appoint Lawyer</a>
              </li>
            <?php }else{ ?>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-brown rounded-0" href="<?php if($account_status == 'lawyer'):echo 'lawyerProfile'; else:echo 'clientProfile'; endif; ?>.php?user_id=<?php echo $user_id;?>">Profile</a>
              </li>
              <?php if(basename($_SERVER['PHP_SELF']) == 'lawyerProfile.php' && $_SESSION['account_status'] == 'lawyer'):echo ''; elseif(basename($_SERVER['PHP_SELF']) == 'clientProfile.php' && $_SESSION['account_status'] == 'client'):echo ''; else: ?>
              <li class="nav-item">
                <a href="inc/login.php?logout=true" class="nav-link btn btn-outline-dark rounded-0">Logout</a>
              </li>             
              <?php 
                endif;
              } 
            ?>
          </ul>
        </div>
      </div>
    </nav>
    <?php    
      if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      }
    ?>  
