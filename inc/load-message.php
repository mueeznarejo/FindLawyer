<?php
  
  session_start();
  session_regenerate_id(false);
  ob_start();

  include_once('db.php');
  include_once('functions.php');

  // Putting session in variable of logged in person
  if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $account_status = $_SESSION['account_status'];
    @$lawyer_id = $_SESSION['lawyer_idMsg'];
    @$client_id = $_SESSION['client_idMsg'];

  }

  if($account_status == 'client'){
    $sqlMessage = "SELECT * FROM `message` INNER JOIN `lawyers` ON message.lawyer_id = lawyers.user_id WHERE `client_id` = '$user_id' AND `lawyer_id` = '$lawyer_id' ORDER BY `message_date` ASC";
    $runMessage = mysqli_query($conn, $sqlMessage);

    @$a++;
    while($row = mysqli_fetch_array($runMessage)){
      $message_id = $row['message_id'];
      $message_status = $row['message_status'];
      $lawyer_id = $row['lawyer_id'];
      $client_id = $row['client_id'];
      $send_by = $row['send_by'];
      $profile_pic = $row['profile_pic'];
      $name = $row['name'];
      $message = $row['message'];
      $message_date = $row['message_date'];
      $date = explode(' ', $message_date); // Exploding date and time
      $time = explode(':', $date[1]);
      
    ?>
      <?php if($send_by == 'lawyer'): ?>
      <div class="incoming_msg">
        <div class="incoming_msg_img"> <img src="uploads/profile/<?php echo $profile_pic; ?>" alt="<?php echo $name; ?>" class="ml-1 mb-2 rounded-circle" style="width:40px;"> </div>
        <div class="received_msg">
          <div class="received_withd_msg">
            <p><?php echo $message; ?></p>
            <span class="time_date"> <?php echo $time[0].':'.$time[1]; ?>    |    <?php echo $date[0]; ?></span></div>
        </div>
      </div>
      <?php else: ?>
      <div class="outgoing_msg">
        <div class="sent_msg">
          <p><?php echo $message; ?></p>
          <span class="time_date"> <?php echo $time[0].':'.$time[1]; ?>    |    <?php echo $date[0]?></span> </div>
      </div>
    <?php
      endif;
    }
  }else{
    
    $sqlMessage = "SELECT * FROM `message` INNER JOIN `clients` ON message.client_id = clients.user_id WHERE `lawyer_id` = '$user_id' AND `client_id` = '$client_id' ORDER BY `message_date` ASC";
    $runMessage = mysqli_query($conn, $sqlMessage);
    while($row = mysqli_fetch_array($runMessage)){
      $message_id = $row['message_id'];
      $message_status = $row['message_status'];
      $lawyer_id = $row['user_id'];
      $client_id = $row['client_id'];
      $send_by = $row['send_by'];
      $profile_pic = $row['profile_pic'];
      $name = $row['name'];
      $message = $row['message'];
      $message_date = $row['message_date'];
      $date = explode(' ', $message_date); // Exploding date and time
      $time = explode(':', $date[1]);
      
    ?>
      <?php if($send_by == 'client'): ?>
      <div class="incoming_msg">
        <div class="incoming_msg_img"><img src="uploads/profile/<?php echo $profile_pic; ?>" alt="<?php echo $name; ?>" class="ml-1 mb-2 rounded-circle" style="width:40px;"> </div>
        <div class="received_msg">
          <div class="received_withd_msg">
            <p><?php echo $message; ?></p>
            <span class="time_date"> <?php echo $time[0].':'.$time[1]; ?>    |    <?php echo $date[0]; ?></span></div>
        </div>
      </div>
      <?php else: ?>
      <div class="outgoing_msg">
        <div class="sent_msg">
          <p><?php echo $message; ?></p>
          <span class="time_date"> <?php echo $time[0].':'.$time[1]; ?>    |    <?php echo $date[0]?></span> </div>
      </div>
    <?php
      endif;
    }
  }
?>
