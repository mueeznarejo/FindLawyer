<?php
  include_once('inc/top.php');
?>

    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="img/bg5.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/bg6.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/bg7.jpg" alt="Third slide">
        </div>
      </div>
      <a id="carouselControl" class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a id="carouselControl" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <div class="search-box">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h5 class="mb-3 text-white">You can find the best lawyer as you can filter the details below:</h5>
              <form action="#" class="form-inline">
                <input type="text" class="form-control border-brown bg-transparent text-white border-0 rounded-0" placeholder="Lawyer City" name="lawyer_city" id="lawyer_city" autocomplete="off">
                <input type="text" class="form-control border-brown bg-transparent text-white border-0 rounded-0" placeholder="Lawyer Court" name="lawyer_court" id="lawyer_court" autocomplete="off">
                <input type="button" id="laywer_submit" name="laywer_submit" class="btn btn-warning rounded-0" value="Search">
              </form>
              <div id="error_message"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <Section id="containers" class="py-5">
      <div class="container">
        <h3 id="searchResult" class="text-brown">Famous Lawyers</h3>
        <div id="load_data" class="row justify-content-between">
          <div id="load_data_message"></div>
          <?php

            $sql = "SELECT * FROM `lawyers` ORDER BY `account_views` DESC LIMIT 3";
            $run = mysqli_query($conn, $sql);

            // Getting Results
            while ($row = mysqli_fetch_array($run)) {
              $user_id = $row['user_id'];
              $name = $row['name'];
              $about = $row['about'];
              $profile_pic = $row['profile_pic'];
              $specialty = $row['specialty'];
              if($specialty == ''){
                $specialty = 'Versatile';
              }

          ?>
          <div class="col-lg-4 col-md-6 mt-4">
            <a href="lawyerProfile.php?user_id=<?php echo $user_id;?>">
              <div class="card bg-light border-0 shadow-sm pt-4 rounded-0 famousLaywer">
                <img class="card-img-top border rounded-circle w-50 mx-auto" src="<?php if($profile_pic == ''):echo 'img/default.jpeg'; else:echo 'uploads/profile/'.$profile_pic; endif; ?>" alt="">
                <div class="card-body text-center">
                  <h4 class="card-title text-dark mb-1"><?php echo $name; ?></h4>
                  <h6 class="text-brown"><i><?php echo $specialty; ?></i></h6>
                  <div class="clearfix"></div>
                  <p class="card-text"><?php echo substr($about, 0,197); ?> ...</p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>
        </div>
      </div>
    </Section>

<?php
  include_once('inc/footer.php');
?>
