<?php
session_start();

if(isset($_POST["lawyer_court"], $_POST["lawyer_city"]))
{
 include("db.php");
 $connect = $conn;
 $lawyer_city = $_POST['lawyer_city'];
 $lawyer_court = $_POST['lawyer_court'];
  $query = "SELECT * FROM `lawyers` WHERE city = '$lawyer_city' AND court = '$lawyer_court' ORDER BY user_id DESC";
 
 $result = mysqli_query($connect, $query);
 $count = mysqli_num_rows($result);
 if($count != 0){
   while($row = mysqli_fetch_array($result))
   {
     $user_id = $row['user_id'];
     $name = $row['name'];
     $speciality = $row['specialty'];
     $about = $row['about'];
     $profile_pic = $row['profile_pic'];
    echo '
      <div class="col-md-4">
        <a href="lawyerProfile.php?user_id='.$user_id.'">
          <div class="card bg-light border-0 shadow-sm pt-4 rounded-0">
            <img class="card-img-top border rounded-circle w-50 mx-auto" src="uploads/profile/'.$profile_pic.'" alt="">
            <div class="card-body text-center">
              <h4 class="card-title text-dark mb-1">'.$name.'</h4>
              <h6 class="text-brown"><i>'.$speciality.'</i></h6>
              <div class="clearfix"></div>
              <p class="card-text">'.substr($about, 0,197).' ...</p>
            </div>
          </div>
        </a>
      </div>
    ';
   }
 }else
 {
  echo "<h5 class='mx-auto font-weight-bold' style='width:fit-content;'>SORRY, YOUR RESULT NOT FOUND.</h5>";
 }
}

?>
