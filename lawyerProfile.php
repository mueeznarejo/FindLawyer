<?php
  // Database and top included
  include_once('inc/top.php');

  // if someone is logged in
  if(@$_GET['user_id'] == NULL && $_SESSION['user_id'] == NULL){
    header('location: index.php');
  }

  if(@$_GET['user_id'] == true){
    $user_id = $_GET['user_id'];
    $updateView = "UPDATE `lawyers` SET `account_views` = `account_views`+1 WHERE `user_id` = '$user_id'";
    $runUpdate = mysqli_query($conn, $updateView);
  }else{
    $user_id = $_SESSION['user_id'];
  }

  $sql = "SELECT * FROM `lawyers` WHERE `user_id` = '$user_id'";
  $run = mysqli_query($conn, $sql);

  if ($row = mysqli_fetch_array($run)) {
    $user_id = $row['user_id'];
    $name = $row['name'];
    $caste = $row['caste'];
    $court = $row['court'];
    $city = $row['city'];
    $office_add = $row['office_add'];
    $license = $row['license'];
    $password = $row['password'];
    $about = $row['about'];
    $specialty = $row['specialty'];
    $profile_pic = $row['profile_pic']; 
  }
?>
  
  <!-- Lawyer profile update  Modal -->
   <div class="modal fade" id="profileSignup" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
              <input type="hidden" value="<?php echo $user_id?>" name="id">
              <input type="hidden" value="<?php echo $_SESSION['account_status']; ?>" name="account_status">
              <div class="col-md-6">
                <input type="text" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="name" placeholder="Full Name" value="<?php echo $name; ?>">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="caste" placeholder="Caste" value="<?php echo $caste; ?>">
              </div>
              <div class="col-md-6">
                <textarea rows="5" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="office_add" placeholder="Office Address..."><?php echo $office_add; ?></textarea>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="city" placeholder="City" value="<?php echo $city; ?>">
                <input type="text" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="court" placeholder="Court" value="<?php echo $court; ?>">
                <input type="text" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="license" placeholder="License" value="<?php echo $license; ?>">
              </div>
              <div style="border-bottom: 2px solid #e2e2e2; height:1px; width: 100%; margin-bottom:7px"></div>
              <h6 class="ml-3 text-brown">Change your password:</h6>
              <div class="col-md-12">
                <input type="password" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="password" value="<?php echo $password; ?>" placeholder="Type new password">
              </div>
              <div style="border-bottom: 2px solid #e2e2e2; height:1px; width: 100%; margin-bottom:7px"></div>
              <h6 class="ml-3 mb-3 text-brown">Add more information about yourself:</h6>
              <div class="col-md-6">
                <textarea rows="5" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="about" placeholder="Write few lines about yourself..."><?php echo $about; ?></textarea>
              </div>
              <div class="col-md-6">
                <textarea rows="5" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="specialty" placeholder="Write your specialty... example: Family Lawyer, Business Lawyer, Finance ete..."><?php echo $row['specialty']; ?></textarea>
              </div>
              <h6 class="ml-3 text-brown">Upload your Photo:</h6>
              <div class="col-md-12">
                <input type="file" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="profile_pic">
              </div>
            </div>
          </div>
          <div class="modal-footer bg-light">
          <input type="submit" name="updateLawyer" value="Update" class="btn btn-block btn-dark rounded-0">
          </div>
        </form>
      </div>
    </div>
  </div>

    <section class="mainContent">
      <div class="profile-header bg-dark py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-2">
              <div class="profile-image">
                <div class="rounded-circle" style="width:150px;height:150px; overflow:hidden;">
                  <img src="<?php if($profile_pic == ''):echo 'img/default.jpeg'; else:echo 'uploads/profile/'.$profile_pic; endif; ?>" alt="Lawyer Profile Image" class="img-fluid rounded-circle">
                </div>
              </div>
            </div>
            <div class="col-md-10">
              <div class="profile-about mt-5">
                <h2 class="text-white mb-0"><?php echo $name; ?></h2>
                <small class="text-white"><?php echo $court.', '.$city; ?></small>
                <div style="height:5px;"></div>
                <?php if(@$_SESSION['user_id'] == $user_id && $_SESSION['account_status'] == 'lawyer'): ?>
                <button class="btn btn-sm btn-outline-brown rounded-0" data-toggle="modal" data-target="#profileSignup">Update your Profile</button>
                <a href="inc/login.php?logout=true" class="btn btn-sm btn-outline-light rounded-0">Logout</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <hr class="m-0">

      <div class="profile-content">
        <div class="row no-gutters">
          <div class="col-md-3 p-5 bg-brown">
            <div class="profile-sidebar">
              <div class="card bg-transparent rounded-0">
                <div class="card-header">
                    <h4 class="p-0 m-0">Profile Details</h4>
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
                      <h6 class="m-0 font-weight-bold float-left">Court:</h6>
                      <h6 class="m-0 float-right sidebarh6"><?php echo $court; ?></h6>
                    </li>
                    <li class="list-group-item">
                      <h6 class="m-0 font-weight-bold float-left">City</h6>
                      <h6 class="m-0 float-right sidebarh6"><?php echo $city; ?></h6>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card rounded-0 mt-3 bg-transparent">
                <div class="card-header">
                  <h4 class="p-0 m-0">About</h4>
                </div>
                <div class="card-body">
                  <div class="profile-desc text-center">
                    <?php if($about == ''):echo 'Not available!'; else:echo $about; endif; ?>
                  </div>
                </div>
              </div>
              <div class="card rounded-0 mt-3 bg-transparent">
                <div class="card-header">
                  <h4 class="p-0 m-0">Office Address</h4>
                </div>
                <div class="card-body">
                  <div class="profile-desc text-center">
                    <?php echo $office_add; ?> 
                  </div>
                </div>
              </div>
              <div class="card rounded-0 mt-3 bg-transparent">
                <div class="card-header">
                  <h4 class="p-0 m-0">Specialty</h4>
                </div>
                <div class="card-body">
                  <div class="profile-spec text-center">
                    <?php if($specialty != ''):
                      $specialty = explode(', ', $specialty);
                      foreach($specialty as $specialty){
                        ?>
                          <?php echo $specialty; ?>
                        <?php
                      }
                    else:echo 'Not available!'; endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END PROFILE SIDEBAR -->
          <div class="col-md-9 p-5">
            <?php if(@$_SESSION['user_id'] == $user_id && $_SESSION['account_status'] == 'lawyer'): ?>
            <div class="tabbable-line">
              <ul class="nav customtab nav-tabs" role="tablist">
                <li class="nav-item"><a href="#tab2" class="nav-link active" data-toggle="tab">Messages</a></li>
                <li class="nav-item"><a href="#tab1" class="nav-link" data-toggle="tab">Appointments</a></li>
              </ul>
              <div class="tab-content">
                <!-- Message Tab -->
                <div class="tab-pane active" id="tab2">
                  <div class="row no-gutters">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-body">
                          <h6 class="ml-1">Send a message:</h6>
                          <form action="inc/message.php" method="POST" class="form-inline">
                            <input type="text" class="form-control w-75 rounded-0" name="message" placeholder="Type a message">
                            <input type="hidden" name="lawyer_id" value="<?php echo $user_id; ?>">
                            <select class="form-control rounded-0" name="chooseClient" id="">
                              <option selected disabled>Select Client</option>
                              <?php
                                $selectClient = "SELECT * FROM `appointment` INNER JOIN `clients` ON appointment.client_id = clients.user_id WHERE `lawyer_id` = '$user_id' AND `appoint_status` < 2";
                                $runClient = mysqli_query($conn, $selectClient);
                                while ($row = mysqli_fetch_array($runClient)) {
                                  $client_name = $row['name'];
                                  $client_id = $row['client_id'];
                                ?>
                                <option value="<?php echo $client_id.'.'.$client_id; ?>"><?php echo $client_name; ?></option>
                                <?php
                                }
                              ?>
                            </select>
                            <input type="submit" value="Send" name="sendMsg" class="btn btn-success rounded-0">
                          </form>
                          <hr class="mb-0 border-bottom-brown">
                          <?php
                            $selectMessage = "SELECT * FROM `message` WHERE `lawyer_id` = '".$_SESSION['user_id']."'";
                            $runMessage = mysqli_query($conn, $selectMessage);
                            $rowMessage = mysqli_fetch_array($runMessage);
                          ?>
                          <div class="row">
                            <div class="col-md-11">
                              <table class="table <?php if($rowMessage != 0):echo 'table-responsive'; endif; ?>">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pic</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Reply</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $sqlMessage = "SELECT * FROM `message` INNER JOIN `clients` ON message.client_id = clients.user_id WHERE `lawyer_id` = '$user_id' AND `send_by` = 'client' ORDER BY `message_date` DESC";
                                    $runMessage = mysqli_query($conn, $sqlMessage);
                                      $a = 1;
                                      while($row = mysqli_fetch_array($runMessage)){
                                        $message_id = $row['message_id'];
                                        $message_status = $row['message_status'];
                                        $lawyer_id = $row['lawyer_id'];
                                        $client_id = $row['client_id'];
                                        $client_idMsg = $row['client_id'];
                                        $send_by = $row['send_by'];
                                        $profile_pic = $row['profile_pic'];
                                        $name = $row['name'];
                                        $email = $row['email'];
                                        $message = $row['message'];
                                        $message_date = $row['message_date'];
                                        $date = explode(' ', $message_date); // Exploding date and time
                                        $time = explode(':', $date[1]);
                                      ?>
                                    <tr>
                                      <th scope="row"><?php echo $a++; ?></th>
                                      <td>
                                        <a href="clientProfile.php?user_id=<?php echo $client_id; ?>">
                                          <img src="uploads/profile/<?php echo $profile_pic; ?>" width="50px" height="50px" class="img img-fluid"/>
                                        </a>
                                      </td>
                                      <td><?php echo $name; ?></td>
                                      <td><?php echo $email; ?></td>
                                      <td><?php echo $message; ?></td>
                                      <td>
                                        <?php
                                         if($message_status < 2): ?>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#messageModal<?php echo $client_id;?>"><i class="fa fa-reply"></i> Reply</button>
                                        <?php else:echo "Declined<br>Can't reply"; endif;?>
                                      </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="messageModal<?php echo $client_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content rounded-0">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Send reply:</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form id="messageForm" action="inc/message.php" method="POST">
                                              <input id="client_id" type="hidden" name="client_id" value="<?php echo $client_id; ?>" />
                                              <input id="lawyer_id" type="hidden" name="lawyer_id" value="<?php echo $lawyer_id; ?>" />
                                              <input id="send_by" type="hidden" name="send_by" value="lawyer" />
                                              <input id="msg" type="text" name="msg" class="write_msg form-control rounded-0 border-0 border-top" placeholder="Type a message" />
                                              <hr>
                                              <input id="msg_btn" value="Send" type="submit" name="msg_btn" class="btn btn-sm btn-block btn-success ml-auto mr-3 rounded-0">
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                      <?php 
                                    }
                                ?>
                                </tbody>
                              </table>
                              <?php
                                if($rowMessage == 0){
                                  echo '<button class="btn btn-block btn-info rounded-0"><i class="fa fa-info-circle"></i> <b>NO MESSAGES</b></button>';
                                }
                              ?>
                            </div>
                            <div class="col-md-1 border-left text-center">
                              <h6 class="heading m-0 py-3 border-bottom font-weight-bold">
                                <i class="fa fa-users"></i>
                              </h6>
                              <?php
                                $selectClients = "SELECT * FROM `appointment` INNER JOIN `clients` ON appointment.client_id = clients.user_id WHERE `lawyer_id` = '".$_SESSION['user_id']."' ORDER BY `appoint_id` DESC";
                                $runClients = mysqli_query($conn, $selectClients);
                                while ($rowClients = mysqli_fetch_array($runClients)) {
                                  $client_id = $rowClients['client_id'];
                                  $profile_pic = $rowClients['profile_pic'];
                                  $client_name = $rowClients['name'];
                                ?>
                                <a href="clientProfile.php?user_id=<?php echo $client_id; ?>">
                                  <img src="uploads/profile/<?php echo $profile_pic; ?>" class="img-fluid mt-2 rounded-circle" alt="">
                                </a>
                                <?php
                                }
                              ?>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Appointments Tab -->
                <div class="tab-pane fontawesome-demo" id="tab1">
                  <div class="row no-gutters">
                    <div class="col-md-12">
                      <div class="card card-box">
                        <div class="card-body scroll">
                          <?php
                            $selectAppointment = "SELECT * FROM `appointment` WHERE `lawyer_id` = '".$_SESSION['user_id']."'";
                            $runAppointment = mysqli_query($conn, $selectAppointment);
                            $rowAppointment = mysqli_fetch_array($runAppointment);
                          ?>
                          <table class="table <?php if($rowAppointment != 0):echo 'table-responsive'; endif; ?> table-scrollable ">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Request</th>
                                <th scope="col">Recived</th>
                                <th scope="col">Profile</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                              $sqlAppoint = "SELECT * FROM `appointment` WHERE `lawyer_id` = '$user_id' ORDER BY `appoint_date` DESC";
                              $runAppoint = mysqli_query($conn, $sqlAppoint);

                              @$a++;
                              while($row = mysqli_fetch_array($runAppoint)){
                                $appoint_id = $row['appoint_id'];
                                $appoint_status = $row['appoint_status'];
                                $lawyer_id = $row['lawyer_id'];
                                $client_id = $row['client_id'];
                                $client_idAppoint = $row['client_id'];
                                $client_name = $row['client_name'];
                                $client_email = $row['client_email'];
                                $client_phone = $row['client_phone'];
                                $client_case_detail = $row['client_case_detail'];
                                $appoint_date = $row['appoint_date'];
                                $date = explode(' ', $appoint_date); // Exploding date and time
                                $time = explode(':', $date[1]);
                              ?>
                                <tr>
                                  <th scope="row"><?php echo $a++; ?></th>
                                  <td><?php echo $client_name; ?></td>
                                  <td><?php echo $client_email.'<br>'.$client_phone; ?></td>
                                  <td><?php echo $client_case_detail; ?></td>
                                  <td><?php echo $date[0]; ?></td>
                                  <td><a href="clientProfile.php?user_id=<?php echo $client_id; ?>"><i class="fa fa-user-circle"></i> Check Profile</a></td>
                                  <td class="text-center">
                                    <?php if($appoint_status == 0): ?>
                                    <a href="inc/appoint.php?appoint_id=<?php echo $appoint_id?>&&appoint_status=1" class="rounded-0 btn btn-sm btn-success mb-2">Accept</a>
                                    <a href="inc/appoint.php?appoint_id=<?php echo $appoint_id?>&&appoint_status=2&&client_id=<?php echo $client_id; ?>&&lawyer_id=<?php echo $lawyer_id; ?>" class="rounded-0 btn btn-sm btn-danger">Decline</a>
                                    <?php elseif($appoint_status == 1): echo '<button class="btn btn-disabled rounded-0 btn-sm">Accpeted</button>'; else:echo 'Declined'; endif; ?>
                                  </td>
                                </tr>
                              <?php
                              }
                            ?>
                            </tbody>
                          </table>
                          <?php
                            if($rowAppointment == 0){
                              echo '<button class="btn btn-block btn-info rounded-0"><i class="fa fa-info-circle"></i> <b>NO APPOINTMENTS</b></button>';
                            }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php elseif(@$_SESSION['user_id']): ?>
          <div class="container">
            <div class="row justify-content-center">

              <!-- Appointment Box -->
              <div class="col-md-6 pt-5">
                <?php
                  $selectAppoint = "SELECT * FROM `appointment` WHERE `client_id` = '".$_SESSION['user_id']."' ORDER BY `appoint_id` DESC LIMIT 1";
                  $runAppoint = mysqli_query($conn, $selectAppoint);
                  $rowAppoint = mysqli_fetch_array($runAppoint);
                  echo mysqli_error($conn);
                  // Variable
                  $appoint_status1 = $rowAppoint['appoint_status'];
                  if($rowAppoint != 0){

                    $selectAppoint = "SELECT * FROM `appointment` WHERE `lawyer_id` = '".$_GET['user_id']."' AND `client_id` = '".$_SESSION['user_id']."' ORDER BY `appoint_id` DESC LIMIT 1";
                    $runAppoint = mysqli_query($conn, $selectAppoint);
                    $rowAppoint = mysqli_fetch_array($runAppoint);
                    echo mysqli_error($conn);

                      if($rowAppoint > 0){
                        // Data from database
                        $appoint_date = $rowAppoint['appoint_date'];
                        $date = explode(' ', $appoint_date); // Exploding date and time
                        $time = explode(':', $date[1]);
                        $appoint_status = $rowAppoint['appoint_status'];

                        if($appoint_status == 0){
                          $_SESSION['disabledDiv'] = "$('#disabledDiv').addClass('disabledDiv');";
                          ?>
                          <div class="rounded-left p-3 mb-2 bg-light" style="border-left: 3px solid black;">
                            <h6 class="mb-0"><i class="fa fa-refresh" aria-hidden="true"></i> <i>Your</i> Appointment <i>request is not yet</i> <strong>accepted</strong>!</h6>
                            <small class="text-brown">Sent on: <b><?php echo $date[0]; ?>&nbsp; <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $time[0].':'.$time[1]; ?></b></small>
                          </div>
                          <?php
                        }elseif($appoint_status == 1){
                          ?>
                          <div class="rounded-left p-3 mb-2 bg-success text-white" style="border-left: 3px solid black;">
                            <h6 class="mb-0"><i class="fa fa-check" aria-hidden="true"></i> <i>Your</i> Appointment <i>request is</i> <strong>accepted</strong>!</h6>
                            <small class="text-white">Sent on: <b><?php echo $date[0]; ?>&nbsp; <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $time[0].':'.$time[1]; ?></b></small>
                          </div>
                          <?php
                          unset($_SESSION['disabledDiv']);
                        }else{
                          ?>
                          <div class="rounded-left p-3 mb-2 bg-danger text-white" style="border-left: 3px solid black;">
                            <h6 class="mb-0"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <i>Your</i> Appointment <i>request is not</i> <strong>accepted</strong>!</h6>
                            <small class="text-white">Sent on: <b><?php echo $date[0]; ?>&nbsp; <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $time[0].':'.$time[1]; ?></b></small>
                          </div>
                          <?php
                          unset($_SESSION['disabledDiv']);
                        }
                      }else{
                        if($appoint_status1 < 2):
                        ?>
                          <div class="rounded-left p-3 mb-2 bg-info" style="border-left: 3px solid black;">
                            <h6 class="mb-0"><i class="fa fa-circle-notch" aria-hidden="true"></i> <i>You had been already </i>Appointing<i> with <b>someone</b>!</i></h6>
                          </div>
                        <?php
                        $_SESSION['disabledDiv'] = "$('#disabledDiv').addClass('disabledDiv');";
                        endif;
                      }
                    }else{
                      unset($_SESSION['disabledDiv']);
                    }
                ?>
                <div id="disabledDiv" class="card rounded-0 border-bottom-brown">
                  <div class="card-header">
                    <h4 class="card-title mb-0">Make an Appointment</h4>  
                  </div>
                  <form action="inc/appoint.php" method="post" id="appointment" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="row">
                        <?php
                          $clientSelect = "SELECT * FROM `clients` WHERE `user_id` = '".$_SESSION['user_id']."'";
                          $runClientSelect = mysqli_query($conn, $clientSelect);
                          $row = mysqli_fetch_array($runClientSelect);
                          
                          $client_name = $row['name'];
                          $client_email = $row['email'];
                          $client_phone = $row['phone'];
                        ?>
                        <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="client_id">
                        <input type="hidden" value="<?php echo $user_id; ?>" name="lawyer_id">
                        <div class="col-md-12">
                          <input type="text" class="form-control border-brown bg-transparent border-0 rounded-0 mb-2" name="name" placeholder="Full Name" value="<?php echo $client_name; ?>" required>
                          <input type="email" class="form-control border-brown bg-transparent border-0 rounded-0 mb-2" name="email" placeholder="Email" value="<?php echo $client_email; ?>" required>
                          <input type="text" class="form-control border-brown bg-transparent border-0 rounded-0 mb-2" name="phone" placeholder="Phone" title="Numbers only 0-9" minlength="11" maxlength="11" value="<?php echo $client_phone; ?>" required>
                        </div>
                        <div class="col-md-12">
                          <textarea rows="5" class="form-control border-brown bg-transparent border-0 rounded-0 mb-2" name="case" placeholder="Write about your appointment request detail... Max length 200 Characters" maxlength="170" required></textarea>
                        </div>
                      </div>
                      <p class="mb-0">By clicking on send appointment requrest you agree to send your given information and to visit your profile to this lawyer and you are agree to our terms and condition. Read our <a href="https://termsfeed.com/terms-conditions/3d4351a6d37b96d1453abbbc74f36b78">Terms and Condition</a>.</p>
                    </div>
                    <div class="modal-footer bg-light">
                      <input type="submit" name="appoint" value="Send appointment request" class="btn btn-block btn-dark rounded-0">
                    </div>
                  </form>               
                </div>
              </div>
            </div>
          </div>
          <?php else: ?>
            <h1 class="display-4 text-center pt-10 mx-auto w-75"><a href="#" data-toggle="modal" data-target="#clientLogin">Login!</a> To chat and make appointment</h1>
          <?php endif; ?>
        </div>
      </div>
    </section>    

<!-- // Modal and footer included -->
<?php include_once('inc/footer.php'); ?>

	
