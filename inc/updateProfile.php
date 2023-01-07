<?php
    session_start();
    session_regenerate_id(true);
    ob_start();
    
    include_once('db.php');
    include_once('functions.php');    
    

    // Form Variables
    $user_id = $_POST['id'];
    $account_status = $_POST['account_status'];
        
    // Check if the data is submitted
    if($_POST['updateLawyer'] || $_POST['updateClient']){ 

        ////////////////////////// Image Upload
        if($_FILES['profile_pic']['name'] != ''){
            // Image Variables
            $image_name = $_FILES['profile_pic']['name'];
            $image_name_tmp = $_FILES['profile_pic']['tmp_name'];
            $path = "../uploads/profile/".$image_name;

            if(!move_uploaded_file($image_name_tmp, $path)){
                $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                <strong>Image not supported</strong>Try again later!
                </div>';
                header('location: '.$_SERVER['HTTP_REFERER']);
            }else{
                // Update query
                $sql = "UPDATE ".$account_status."s SET `profile_pic`='$image_name' WHERE `user_id` = '$user_id'";
                if(!$run = mysqli_query($conn, $sql)){
                    $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                        <strong>Error in uploading image</strong>Try again later!
                    </div>';
                    header('location: '.$_SERVER['HTTP_REFERER']);                
                }
            }
        }    

    if($_POST['updateLawyer']){
        ////////////////////////// Uploading Other Info
        // variables from form 
        $name = filter($conn, $_POST['name']);
        $caste = filter($conn, $_POST['caste']);
        $office_add = filter($conn, $_POST['office_add']);
        $city = filter($conn, $_POST['city']);
        $court = filter($conn, $_POST['court']);
        $license = filter($conn, $_POST['license']);
        $about = filter($conn, $_POST['about']);
        $specialty = filter($conn, $_POST['specialty']);    
        $password = $_POST['password'];    
        
        // Update query
        $updateSql = "UPDATE `lawyers` SET `name`='$name',`caste`='$caste',`city`='$city',`office_add`='$office_add',`court`='$court',`license`='$license',`password`='$password',`about`='$about',`specialty`='$specialty' WHERE `user_id` = '$user_id'";
        $runUpdate = mysqli_query($conn, $updateSql);
        
        if($runUpdate){
            $result = true;
        }else{
            $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <strong>Failed to update</strong>Try again later!
            </div>';
            header('location: '.$_SERVER['HTTP_REFERER']); 
        }
    }elseif($_POST['updateClient']){
        // variables from form 
        $name = filter($conn, $_POST['name']);
        $city = filter($conn, $_POST['city']);   
        $case = filter($conn, $_POST['case']);   
        
        // Update query
        $updateSql = "UPDATE `clients` SET `name`='$name',`city`='$city',`reason`='$case' WHERE `user_id` = '$user_id'";
        $runUpdate = mysqli_query($conn, $updateSql);
        
        if(!$runUpdate){
            $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                <strong>Failed to update</strong>Try again later!
            </div>';
            header('location: '.$_SERVER['HTTP_REFERER']); 
        }else{
            $result = true;
        }
    }
        
    // Success Notification
    if($result = true){
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Account successfully updated</strong>
        </div>';
        header('location: '.$_SERVER['HTTP_REFERER']); 
    }
}
?>
