<?php
    session_start();
    session_regenerate_id(true);
    ob_start();
    
    include_once('db.php');
    include_once('functions.php');    

    ///////////////////////////////// Login
    
    if($_POST['lawyerLogin']){ // Lawyer Login
        
        $loginForm = $_POST['loginForm']; // To know which form is submitted: Client // Lawyer 
        login($conn, $loginForm);
    
    }elseif($_POST['clientLogin']){ // Client Login
    
        $loginForm = $_POST['loginForm']; // To know which form is submitted: Client // Lawyer 
        login($conn, $loginForm);
    
    }elseif($_GET['logout']){
        $user_id = $_SESSION['user_id'];
        // update query
        if($_SESSION['account_status'] == 'client'){
            $update = "UPDATE `clients` SET `online_status` = 0 WHERE `user_id` = '$user_id'";
        }elseif($_SESSION['account_status'] == 'lawyer'){
            $update = "UPDATE `lawyers` SET `online_status` = 0 WHERE `user_id` = '$user_id'";
        }
        $run = mysqli_query($conn, $update);

        // Unset and Destroy Session
        unset($_SESSION['user_id']);
        unset($_SESSION['account_status']);
        unset($_SESSION['lawyer_idMsg']);
        unset($_SESSION['client_idMsg']);

        session_destroy();

        header('location: ../index.php');
        
    }else{
        header("location: ../index.php");
    }
?>
