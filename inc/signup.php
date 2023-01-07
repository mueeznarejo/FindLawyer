<?php
    session_start();
    session_regenerate_id(true);
    ob_start();
    
    include_once('db.php');
    include_once('functions.php');    

    ///////////////////////////////// Lawyer Signup

    // Check if the data is submitted
    if($_POST['lawyerSignup']){

        // Form Variables
        $name = filter($conn, $_POST['name']);
        $caste = filter($conn, $_POST['caste']);
        $gender = filter($conn, $_POST['gender']);
        $city = filter($conn, $_POST['city']);
        $office_add = filter($conn, $_POST['office_add']);
        $court = filter($conn, $_POST['court']);
        $license = filter($conn, $_POST['license']);
        $phone = filter($conn, $_POST['phone']);
        $email = filter($conn, $_POST['email']);
        $password = $_POST['password'];

        //  Check if the account already exits
        $sql = "SELECT * FROM `lawyers` WHERE `phone` = '$phone' OR `email` = '$email'";
        $run = mysqli_query($conn, $sql);

        if(mysqli_num_rows($run) != 0){
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
                    <strong>Email or Phone already exits, </strong>Please Choose another!
                </div>';
            header("location: ../index.php");
        }else{
            // Email or Phone doesn't exits, insert new account
            $sql = "INSERT INTO `lawyers`(`name`, `caste`, `gender`, `city`, `office_add`, `court`, `license`, `phone`, `email`, `password`) VALUES ('$name','$caste','$gender','$city','$office_add','$court','$license','$phone','$email','$password')";
            $run = mysqli_query($conn, $sql);

            if($run){
                $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                    <strong>Account successfully created </strong>Please login!
                </div>';
                header("location: ../index.php"); 
            }else{
                $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                    <strong>Error in Creating Account </strong>Try again later!
                </div>';
                header("location: ../index.php"); 
            }
        }


    ///////////////////////////////// Client Signup

    // Check if the data is submitted
    }elseif($_POST['clientSignup']){
        // Form Variables
        $name = filter($conn, $_POST['name']);
        $caste = filter($conn, $_POST['caste']);
        $gender = filter($conn, $_POST['gender']);
        $city = filter($conn, $_POST['city']);
        $address = filter($conn, $_POST['address']);
        $reason = filter($conn, $_POST['reason']);
        $phone = filter($conn, $_POST['phone']);
        $email = filter($conn, $_POST['email']);
        $password = $_POST['password'];

        //  Check if the account already exits
        $sql = "SELECT * FROM `clients` WHERE `phone` = '$phone' OR `email` = '$email'";
        $run = mysqli_query($conn, $sql);

        if(mysqli_num_rows($run) != 0){
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
                    <strong>Email or Phone already exits, </strong>Please Choose another!
                </div>';
            header("location: ../index.php");
        }else{
            // Email or Phone doesn't exits, insert new account
            $sql = "INSERT INTO `clients`(`name`, `caste`, `gender`, `city`, `address`, `reason`, `phone`, `email`, `password`) VALUES ('$name','$caste','$gender','$city','$address','$reason','$phone','$email','$password')";
            $run = mysqli_query($conn, $sql);

            if($run){
                $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                    <strong>Account successfully created </strong>Please login!
                </div>';
                header("location: ../index.php"); 
            }else{
                $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                    <strong>Error in Creating Account </strong>Try again later!
                </div>';
                header("location: ../index.php"); 
            }
        }
    }else{
        header("location: ../index.php");
    }

?>
