<?php
    session_start();
    session_regenerate_id(true);
    ob_start();
    
    include_once('db.php');
    include_once('functions.php');    
    

    if($_POST['appoint']){
        // Form Variables
        $client_id = $_POST['client_id'];
        $lawyer_id = $_POST['lawyer_id'];
        $name = filter($conn, $_POST['name']);
        $phone = filter($conn, $_POST['phone']);
        $email = filter($conn, $_POST['email']);
        $case = filter($conn, $_POST['case']);

        $sql = "INSERT INTO `appointment`(`lawyer_id`, `client_id`, `client_name`, `client_email`, `client_phone`, `client_case_detail`) VALUES ('$lawyer_id','$client_id','$name','$email','$phone','$case')";
        $runSql = mysqli_query($conn, $sql);

        $_SESSION['message'] = '<div class="alert1 alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Appoint send successfuly!</strong> Check out at your profile page
        </div>';
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }elseif($_POST['cancelAppoint'.$_POST['appoint_id']]){
        $lawyer_id = $_POST['lawyer_id'];
        $client_id = $_POST['client_id'];

        $sql = "DELETE FROM `appointment` WHERE `lawyer_id` = '$lawyer_id' AND `client_id` = '$client_id'";
        $runSql = mysqli_query($conn, $sql);
        
        $_SESSION['message'] = '<div class="alert1 alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Appointment Caceled!</strong>
        </div>';
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }elseif($_GET['appoint_id'] && $_GET['appoint_status'] == 1){
        $appoint_id = $_GET['appoint_id'];
        $appoint_status = $_GET['appoint_status'];

        $sqlUpdate = "UPDATE `appointment` SET
          `appoint_status` = '1'
        WHERE `appoint_id` = '$appoint_id'";
        $runUpdate = mysqli_query($conn, $sqlUpdate);

        header('Location: '. $_SERVER['HTTP_REFERER']);
    }elseif($_GET['appoint_id'] && $_GET['appoint_status'] == 2){
        $appoint_id = $_GET['appoint_id'];
        $lawyer_id = $_GET['lawyer_id'];
        $client_id = $_GET['client_id'];

        $sqlUpdate = "UPDATE `appointment` SET
          `appoint_status` = '2'
        WHERE `appoint_id` = '$appoint_id'";
        $runUpdate = mysqli_query($conn, $sqlUpdate);
        
        $sqlUpdate = "UPDATE `message` SET `message_status` = 2 WHERE `client_id` = '$client_id' AND `lawyer_id` = '$lawyer_id'";
        $runUpdate = mysqli_query($conn, $sqlUpdate);
        
        $_SESSION['message'] = '<div class="alert1 alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Appointment Caceled!</strong>
        </div>';
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }else{
        header('Locaiton: '. $_SERVER['HTTP_REFERER']);
    }
?>
