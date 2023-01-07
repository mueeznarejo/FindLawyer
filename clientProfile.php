<?php
  // Database and top included
  include_once('inc/top.php');
  
  // if someone is logged in
  if($_SESSION['user_id'] == false){
    header('location: index.php');
  }

  if(@$_GET['user_id'] == true){
    $user_id = $_GET['user_id'];
  }else{
    $user_id = $_SESSION['user_id'];
  }

  $sql = "SELECT * FROM `clients` WHERE `user_id` = '$user_id'";
  $run = mysqli_query($conn, $sql);

  if ($row = mysqli_fetch_array($run)) {
    $user_id = $row['user_id'];
    $name = $row['name'];
    $caste = $row['caste'];
    $gender = $row['gender'];
    $city = $row['city'];
    $phone = $row['phone'];
    $email = $row['email'];
    $address = $row['address'];
    $case = $row['reason'];
    $password = $row['password'];
    $profile_pic = $row['profile_pic'];
    // $profile_pic = $row['profile_pic']; 
  }
?>

    <section class="mainContent">
      <div class="profile-header bg-dark py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-lg-2">
              <div class="profile-image">
                <div class="rounded-circle" style="width:150px;height:150px; overflow:hidden;">
                  <img src="<?php if($profile_pic == ''):echo 'img/default.jpeg'; else:echo 'uploads/profile/'.$profile_pic; endif; ?>" alt="Lawyer Profile Image" class="img-fluid rounded-circle">
                </div>
              </div>
            </div>
            <div class="col-md-9 col-lg-10">
              <div class="profile-about mt-5">
                <h2 class="text-white"><?php echo $name; ?></h2>
                <?php if(@$_SESSION['user_id'] == $user_id): ?>
                <button class="btn btn-sm btn-outline-brown rounded-0" data-toggle="modal" data-target="#updateClient">Update your Profile</button>
                <a href="inc/login.php?logout=true" class="btn btn-sm btn-outline-light rounded-0">Logout</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <hr class="m-0">

      <div class="profile-content clientProfile">
        <div class="row no-gutters">
          <div class="col-md-5 p-5 bg-brown">
            <div class="profile-sidebar <?php if($_SESSION['account_status'] == 'lawyer'):echo ' w-100 mx-auto'; endif; ?>">
              <div class="card rounded-0 mb-3 bg-transparent">
                <div class="card-header">
                  <h4 class="p-0 m-0">Case Details</h4>
                </div>
                <div class="card-body">
                  <div class="profile-desc text-center">
                    <?php if($case == ''):echo 'Not available!'; else:echo $case; endif; ?>
                  </div>
                </div>
              </div>
              <div class="card bg-transparent rounded-0">
                <div class="card-header">
                    <h4 class="p-0 m-0">About</h4>
                </div>
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <h6 class="m-0 font-weight-bold float-left">Name:</h6>
                      <h6 class="m-0 float-right sidebarh6"><?php echo $name; ?></h6>
                    </li>
                    <li class="list-group-item">
                      <h6 class="m-0 font-weight-bold float-left">Caste</h6>
                      <h6 class="m-0 float-right sidebarh6"><?php echo $caste; ?></h6>
                    </li>
                    <li class="list-group-item">
                      <h6 class="m-0 font-weight-bold float-left">Gender:</h6>
                      <h6 class="m-0 float-right sidebarh6"><?php echo $gender; ?></h6>
                    </li>
                    <li class="list-group-item">
                      <h6 class="m-0 font-weight-bold float-left">City</h6>
                      <h6 class="m-0 float-right sidebarh6"><?php echo $city; ?></h6>
                    </li>
                    <li class="list-group-item">
                      <h6 class="m-0 font-weight-bold float-left">Phone</h6>
                      <h6 class="m-0 float-right sidebarh6"><?php echo $phone; ?></h6>
                    </li>
                    <li class="list-group-item">
                      <h6 class="m-0 font-weight-bold float-left">Email:</h6>
                      <h6 class="m-0 float-right sidebarh6"><?php echo $email; ?></h6>
                    </li>
                    <li class="list-group-item">
                      <h6 class="m-0 font-weight-bold float-left">Address</h6>
                      <h6 class="m-0 float-right sidebarh6"><?php echo $address; ?></h6>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        <!-- END PROFILE SIDEBAR -->
        <?php
          if($_SESSION['account_status'] == 'client'):
            
            $selectAppoint = "SELECT * FROM `appointment` WHERE `client_id` = '".$_SESSION['user_id']."' ORDER BY `appoint_id` DESC LIMIT 1";
            $runAppoint = mysqli_query($conn, $selectAppoint);
            $rowAppoint = mysqli_fetch_array($runAppoint);
            $appoint_status = $rowAppoint['appoint_status'];
            if($rowAppoint != 0 && $appoint_status < 2):
          ?>
            <div class="col-md-7 p-5">
              <div class="tabbable-line">
                <ul class="nav customtab nav-tabs" role="tablist">
                  <li class="nav-item"><a href="#tab2" class="nav-link active" data-toggle="tab">Messages</a></li>
                  <li class="nav-item"><a href="#tab1" class="nav-link" data-toggle="tab">Appointments</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane  fontawesome-demo" id="tab1">
                    <div class="row no-gutters">
                      <div class="col-md-12">
                        <div class="card card-box">
                          <div class="card-body">
                            <div class="table-scrollable" id="tableStds">
                              <?php
                                $sql = "SELECT * FROM `appointment` INNER JOIN `lawyers` ON lawyers.user_id = appointment.lawyer_id WHERE appointment.client_id = '$user_id' ORDER BY `appoint_id` DESC";
                                $runSql = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($runSql)){
                                    $profile_pic = $row['profile_pic'];
                                    $lawyer_id = $row['lawyer_id'];
                                    $lawyer_name = $row['name'];
                                    $lawyer_court = $row['court'];
                                    $lawyer_city = $row['city'];
                                    $lawyer_email = $row['email'];
                                    $lawyer_phone = $row['phone'];
                                    $office_add = $row['office_add'];
                                    $appoint_id = $row['appoint_id'];
                                    $appoint_status = $row['appoint_status'];
                                    $appoint_date = $row['appoint_date'];
                                    $date = explode(' ', $appoint_date); // Exploding date and time
                                    $time = explode(':', $date[1]);

                                    if($appoint_status == 0){
                                      ?>
                                      <div class="p-3 mb-3 rounded-left bg-light" style="border-left: 3px solid black;">
                                        <div class="row">
                                          <div class="col-md-2">
                                            <img src="uploads/profile/<?php echo $profile_pic; ?>" alt="Profile Picture" class="img-fluid">
                                          </div>
                                          <div class="col-md-7">
                                            <h6 class=""><i class="fa fa-refresh" aria-hidden="true"></i> <i>Your</i> Appointment <i>request is not yet</i> <strong>accepted</strong>!</h6>
                                            <h5 class="mb-0">Advocate: <b><?php echo $lawyer_name; ?></b></h5>
                                            <small class="s"><?php echo $lawyer_court.', '.$lawyer_city; ?></small>
                                            <div style="height:5px;"></div>
                                            <small class="text-brown">Sent on: <b><?php echo $date[0]; ?>&nbsp; <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $time[0].':'.$time[1]; ?></b></small>
                                          </div>
                                          <div class="col-md-3">
                                            <a href="lawyerProfile.php?user_id=<?php echo $lawyer_id; ?>" class="btn btn-info btn-sm float-right mb-2 rounded-0"><i class="fa fa-user-circle" aria-hidden="true"></i> &nbsp;Profile</a>
                                            <form action="inc/appoint.php" method="POST">
                                              <input type="hidden" value="<?php echo $appoint_id; ?>" name="appoint_id">
                                              <input type="hidden" value="<?php echo $lawyer_id; ?>" name="lawyer_id">
                                              <input type="hidden" value="<?php echo $user_id; ?>" name="client_id">
                                              <input type="submit" value="Cancel Appointment" name="cancelAppoint<?php echo $appoint_id; ?>" class="rounded-0 btn btn-danger btn-sm float-right">
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                      <?php
                                    }elseif($appoint_status == 1){
                                      ?>
                                      <div class="p-3 mb-3 rounded-left bg-success text-white" style="border-left: 3px solid black;">
                                        <div class="row">
                                          <div class="col-md-2">
                                            <img src="uploads/profile/<?php echo $profile_pic; ?>" alt="Profile Picture" class="img-fluid">
                                          </div>
                                          <div class="col-md-7">
                                            <h6><i class="fa fa-check" aria-hidden="true"></i> <i>Your</i> Appointment <i>request is</i> <strong>accepted</strong>!</h6>
                                            <h5 class="mb-0">Advocate: <b><?php echo $lawyer_name; ?></b></h5>
                                            <small class="s"><?php echo $lawyer_email.' | '.$lawyer_phone; ?></small>
                                            <div style="height:5px;"></div>
                                            <small>Office Address: <b><?php echo $office_add; ?></b></small>
                                          </div>
                                          <div class="col-md-3">
                                            <a href="lawyerProfile.php?user_id=<?php echo $lawyer_id; ?>" class="btn btn-light btn-sm float-right mb-2 rounded-0"><i class="fa fa-user-circle" aria-hidden="true"></i> &nbsp;Profile</a>
                                          </div>
                                        </div>
                                      </div>
                                      <?php
                                    }else{
                                      ?>
                                      <div class="p-3 mb-3 rounded-left bg-danger text-white" style="border-left: 3px solid black;">
                                        <div class="row">
                                          <div class="col-md-2">
                                            <img src="uploads/profile/<?php echo $profile_pic; ?>" alt="Profile Picture" class="img-fluid">
                                          </div>
                                          <div class="col-md-7">
                                            <h6><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <i>Your</i> Appointment <i>request is not</i> <strong>accepted</strong>!</h6>
                                            <h5 class="mb-0">Advocate: <b><?php echo $lawyer_name; ?></b></h5>
                                            <small class="s"><?php echo $lawyer_court.', '.$lawyer_city; ?></small>
                                            <div style="height:5px;"></div>
                                            <small class="text-dark">Sent on: <b><?php echo $date[0]; ?>&nbsp; <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $time[0].':'.$time[1]; ?></b></small>
                                          </div>
                                          <div class="col-md-3">
                                            <a href="lawyerProfile.php?user_id=<?php echo $lawyer_id; ?>" class="btn btn-light btn-sm float-right mb-2 rounded-0"><i class="fa fa-user-circle" aria-hidden="true"></i> &nbsp;Profile</a>
                                          </div>
                                        </div>
                                      </div>
                                      <?php
                                    }
                                }
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane active" id="tab2">
                  <div class="row no-gutters">
                      <div class="col-md-12">
                        <div class="card card-box">
                          <div class="card-body">
                            <div class="table-scrollable" id="tableStds">
                            <?php
                              $sqlMessage = "SELECT * FROM `appointment` INNER JOIN `lawyers` ON lawyers.user_id = appointment.lawyer_id WHERE appointment.client_id = '$user_id' ORDER BY `appoint_id` DESC LIMIT 1";
                              $runMessage = mysqli_query($conn, $sqlMessage);
                              $rowAssco = mysqli_fetch_assoc($runMessage);
                              $name = $rowAssco['name']; 
                              $profile_pic = $rowAssco['profile_pic']; 
                              $lawyer_id = $rowAssco['user_id'];
                              $_SESSION['lawyer_idMsg'] = $lawyer_id; 
                            ?>
                            <a href="lawyerProfile.php?user_id=<?php echo $lawyer_id; ?>">
                              <img src="uploads/profile/<?php echo $profile_pic; ?>" class="rounded-circle mt-0 mb-2 p-0" width="50px">
                            </a>&nbsp;&nbsp;<span class="h5 text-dark border-left pl-1 font-weight-bold text-uppercase"><?php echo $name; ?></span>

                            <div class="messaging">
                              <div class="inbox_msg">
                                <div class="mesgs">
                                  <div id="message" class="msg_history">
                                    <?php
                                      $sqlMessage = "SELECT * FROM `message` INNER JOIN `lawyers` ON message.lawyer_id = lawyers.user_id WHERE `client_id` = '$user_id' AND `lawyer_id` = '$lawyer_id' ORDER BY `message_date` ASC";
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
                                        <?php if($send_by == 'lawyer'): ?>
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
                                    ?>
                                  </div>
                                  <div class="type_msg">
                                    <div class="input_msg_write">
                                      <form id="messageForm" action="inc/message.php" method="POST" class="form-inline">
                                        <input id="client_id" type="hidden" name="client_id" value="<?php echo $user_id; ?>" />
                                        <input id="lawyer_id" type="hidden" name="lawyer_id" value="<?php echo $lawyer_id; ?>" />
                                        <input id="send_by" type="hidden" name="send_by" value="client" />
                                        <input id="msg" type="text" name="msg" class="write_msg form-control w-75 border-0 border-top" placeholder="Type a message" />
                                        <input id="msg_btn" value="Send" type="submit" name="msg_btn" class="btn btn-sm btn-primary ml-auto mr-3 rounded-0">
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            elseif($rowAppoint != 0 && $appoint_status == 2):
              echo "<h1 class='display-4 mx-auto pt-10' style='width:fit-content;'><i class='fa fa-info-circle text-danger'></i> <br> Your <b>Appointment</b><br>request is not accepted. <br> <a href='index.php'>Try again</a>!</h1>";  
            else:
              echo "<h1 class='display-4 mx-auto pt-10' style='width:fit-content;'><i class='fa fa-info-circle text-danger'></i><br>To chat make an<br><b>Appointment</b> <a href='index.php'>First</a>!</h1>"; 
            endif;
          else:
            ?>
            <div class="col-md-7 p-5">
              <div class="messaging">
                <div class="inbox_msg">
                  <div class="mesgs">
                    <div id="message" class="msg_history">
                      <?php
                        $sqlMessage = "SELECT * FROM `message` INNER JOIN `clients` ON message.client_id = clients.user_id WHERE `lawyer_id` = '".$_SESSION['user_id']."' AND `client_id` = '".$_GET['user_id']."' ORDER BY `message_date` ASC";
                        $runMessage = mysqli_query($conn, $sqlMessage);

                        while($row = mysqli_fetch_array($runMessage)){
                          $message_id = $row['message_id'];
                          $message_status = $row['message_status'];
                          $lawyer_id = $row['lawyer_id'];
                          $_SESSION['lawyer_idMsg'] = $lawyer_id;
                          $client_id = $row['client_id'];
                          $_SESSION['client_idMsg'] = $client_id;
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
                      ?>
                    </div>
                    <div class="type_msg">
                      <div class="input_msg_write">
                        <form id="messageForm" action="inc/message.php" method="POST" class="form-inline">
                          <input id="client_id" type="hidden" name="client_id" value="<?php echo $client_id; ?>" />
                          <input id="lawyer_id" type="hidden" name="lawyer_id" value="<?php echo $lawyer_id; ?>" />
                          <input id="send_by" type="hidden" name="send_by" value="lawyer" />
                          <input id="msg" type="text" name="msg" class="write_msg form-control w-75 border-0 border-top" placeholder="Type a message" />
                          <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="ml-auto btn btn-sm btn-secondary rounded-0">Back</a>
                          <input id="msg_btn" value="Send" type="submit" name="msg_btn" class="ml-2 btn btn-sm btn-primary rounded-0">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
          endif;
        ?>
        </div>
      </div>
    </section>    

    <!-- Client profile update  Modal -->
    <div class="modal fade" id="updateClient" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <div class="panel">
              <h3 class="text-dark">Update  <span class="text-brown">Info</span></h3>
              <p class="mb-0">Please complete following information:</p>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="inc/updateProfile.php" method="post" id="lawyerSignup" enctype="multipart/form-data">
            <div class="modal-body bg-light updateModal">
              <div class="row">
                <h6 class="ml-3 mb-3 text-brown">Add case details:</h6>
                <div class="col-md-12">
                  <textarea rows="5" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="case" placeholder="Write few lines about yourself..."><?php echo $case; ?></textarea>
                </div>
                <div style="border-bottom: 2px solid #e2e2e2; height:1px; width: 100%; margin-bottom:7px"></div>
                <input type="hidden" value="<?php echo $user_id; ?>" name="id">
                <input type="hidden" value="<?php echo $_SESSION['account_status'];?>" name="account_status">
                <div class="col-md-6">
                <h6 class="mb-2 text-brown">Name:</h6>
                  <input type="text" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="name" placeholder="Full Name" value="<?php echo $name; ?>">
                </div>
                <div class="col-md-6">
                <h6 class="mb-2 text-brown">City:</h6>
                  <input type="text" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="city" placeholder="City" value="<?php echo $city; ?>">
                </div>
                <div class="col-md-12">
                  <h6 class="mb-2 text-brown">Address:</h6>
                  <textarea rows="3" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="address" placeholder="Write few lines about yourself..."><?php echo $address; ?></textarea>
                </div>
                <div style="border-bottom: 2px solid #e2e2e2; height:1px; width: 100%; margin-bottom:7px"></div>
                <h6 class="ml-3 mb-2 text-brown w-100">Change Password:</h6>
                <div class="col-md-6">
                  <input type="password" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="old_password" placeholder="Type your current Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </div>
                <div class="col-md-6">
                  <input type="password" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="new_password" placeholder="Type new Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </div>
                <div style="border-bottom: 2px solid #e2e2e2; height:1px; width: 100%; margin-bottom:7px"></div>
                <h6 class="ml-3 text-brown">Upload your Photo:</h6>
                <div class="col-md-12">
                  <input type="file" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="profile_pic">
                </div>
              </div>
            </div>
            <div class="modal-footer bg-light">
            <input type="submit" name="updateClient" value="Update" class="btn btn-block btn-dark rounded-0">
            </div>
          </form>
        </div>
      </div>
    </div>

<!-- Footer and modals included -->
<?php include_once('inc/footer.php'); ?>

	
