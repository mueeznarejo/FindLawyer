<?php

session_start();
session_regenerate_id(true);
ob_start();

include_once('../inc/db.php');

// if someone is logged in
if($_SESSION['admin_id'] == false){
    header('location: index.php');
}

// Putting session in variable of logged in person
if(isset($_SESSION['user_id'])){
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
