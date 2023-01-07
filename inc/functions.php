<?php
    //////////////////////////// Function for 'active' class in nav
    
    function active($page){
        $self = $_SERVER["PHP_SELF"];
        $basename = basename($self);
        if($basename == $page){
            echo 'active';
        }
    }

    //////////////////////////// Filtering User input form attacks

    function filter($conn, $input){
        $a = $input;
        $a = htmlspecialchars($a);
        $a = mysqli_real_escape_string($conn, $a);

        return $a; 
    }

    //////////////////////////// Login Function
    function login($conn, $loginForm){
        // Form Variables
        $email = filter($conn, $_POST['email']);
        $password = $_POST['password'];

        // Query to check account is available
        $sql = "SELECT * FROM `".$loginForm."` WHERE `email` = '$email' LIMIT 1";
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
                $db_password = $result['password'];
                $user_id = $result['user_id'];
                $account_status = $result['account_status'];

            // Check if the account in database matches
            if($db_password == $password){
                // Password is correct
                // Update Online Status
                $update = "UPDATE `".$loginForm."` SET `online_status`= 1 WHERE `user_id` = '$user_id'";
                $runUpdate = mysqli_query($conn, $update);

                // Creating Sessions
                $_SESSION['user_id'] = $user_id;
                $_SESSION['account_status'] = $account_status;

                // Redirection to profiles
                if($account_status == 'lawyer'){
                    header('location: ../lawyerProfile.php');
                }elseif($account_status == 'client'){
                    header('location: ../clientProfile.php');
                }
            }else{
                // Password is incorrect
                $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert"><strong>Password is incorrect </strong>Try again!
                </div>';
                header("location: ".$_SERVER['HTTP_REFERER']);
            }
        }
    }
?>
