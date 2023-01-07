<?php
    session_start();
    session_regenerate_id(true);
    ob_start();
    
    include_once('../../inc/db.php');
    include_once('../../inc/functions.php');    

    ///////////////////////////////// Login
    
    if($_POST['submit_btn']){ // Lawyer Login
        //////////////////////////// Login Function
        // Form Variables
        $username = filter($conn, $_POST['username']);
        $password = $_POST['password'];

        // Query to check account is available
        $sql = "SELECT * FROM `admin` WHERE `username` = '$username' LIMIT 1";
        $run = mysqli_query($conn, $sql);

        // result Is the account available
        if(mysqli_num_rows($run) == 0){ // Account not available
            $_SESSION['message'] = '<div class="alert alert-info alert-dismissible fade show mb-0" role="alert">
                <strong>Account not exists, </strong>Please Signup first!
            </div>';
            header("location: ".$_SERVER['HTTP_REFERER']);
        }else{ // Account Available
            
            // Getting variables from result
            $result = mysqli_fetch_array($run);
            // Variables
            $admin_id = $result['admin_id'];

            // Update Online Status
            $update = "UPDATE `admin` SET `online_status`= 1 WHERE `admin_id` = '$admin_id'";
            $runUpdate = mysqli_query($conn, $update);

            // Creating Sessions
            $_SESSION['admin_id'] = $admin_id;

            header('location: ../dashboard.php');
        }
    }elseif($_GET['logout']){
        $admin_id = $_SESSION['admin_id'];
        // update query
        $update = "UPDATE `admin` SET `online_status` = 0 WHERE `admin_id` = '$admin_id'";
        $run = mysqli_query($conn, $update);

        // Unset and Destroy Session
        unset($_SESSION['admin_id']);
        session_destroy();

        header('Location: '.$_SERVER['HTTP_REFERER']);
    }else{
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
?>
