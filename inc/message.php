<?php
    session_start();
    ob_start();
    
    include_once('db.php');
    include_once('functions.php');    
    

    if(isset($_POST['msg_btn'])){
        $client_id = $_POST['client_id'];
        $lawyer_id = $_POST['lawyer_id'];
        $send_by = $_POST['send_by'];
        $msg = filter($conn, $_POST['msg']);

        $sql = "INSERT INTO `message`(`lawyer_id`,`client_id`,`send_by`,`message`) VALUES ('$lawyer_id','$client_id','$send_by','$msg')";
        $runSql = mysqli_query($conn, $sql);
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }elseif($_POST['sendMsg']){
        $nameId = $_POST['chooseClient'];
        $nameId = explode('.', $nameId);
        $name = $nameId['0'];
        $client_id = $nameId['1'];
        $lawyer_id = $_POST['lawyer_id'];
        $msg = filter($conn, $_POST['message']);

        $sql = "INSERT INTO `message`(`lawyer_id`,`client_id`,`send_by`,`message`) VALUES ('$lawyer_id','$client_id','lawyer','$msg')";
        $runSql = mysqli_query($conn, $sql);
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }else{
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
?>
