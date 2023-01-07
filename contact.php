<?php
  include_once('inc/top.php');
?> 
    <!-- Carousel -->
    <header style="background-image: url(img/bg1.jpg); background-position: top;">
      <div class="container">
          <div class="jumbotron bg-transparent">
            <h1 class="display-3 contactH1 text-dark">Contact us</h1>
            <p class="lead contactP text-secondary">We will give the reply at your email soon.</p>
          </div>
      </div>
    </header>
    
    <Section id="containers" class="py-5">
        <div class="container">
            <div class="row no-gutters justify-content-between">
                <div class="col-md-8">
                    <h4 class="text-brown mb-3"><i class="fas fa-mail-bulk"></i> Contact us:</h4>
                    <form action="contact.php" method="POST" id="contact">
                        <input type="text" class="form-control border-brown bg-transparent border-0 rounded-0 mb-2" name="name" placeholder="Full Name">
                        <input type="email" class="form-control border-brown bg-transparent border-0 rounded-0 mb-2" name="email" placeholder="Your Email">
                        <input type="text" class="form-control border-brown bg-transparent border-0 rounded-0 mb-2" name="related" placeholder="Related to">
                        <textarea rows="5" class="form-control border-brown bg-transparent border-0 rounded-0 mb-2" name="contact_reason" placeholder="Purpose of your contact..."></textarea>
                        <input type="submit" name="contact" value="Submit" class="btn btn-block btn-dark rounded-0">
                    </form>
                    <?php
                      if(isset($_POST['contact'])){
                        // Variables from form
                        $name = filter($conn, $_POST['name']);
                        $email = filter($conn, $_POST['email']);
                        $related = filter($conn, $_POST['related']);
                        $contact_reason = filter($conn, $_POST['contact_reason']);

                        // Query
                        $sql = "INSERT INTO `admin_contact`(`name`, `email`, `related`, `contact_reason`)VALUES('$name', '$email', '$related', '$contact_reason')";
                        $run = mysqli_query($conn, $sql);
                        // Check query
                        if(!$run){
                          echo 'Failed to send message: '.mysqli_error($conn);
                        }else{
                          $_SESSION['message'] = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                              <strong>Your Contact Request has sent. </strong>Successfully
                            </div>';
                          header('location: contact.php');
                        }
                      }
                    ?>
                </div>
                <div class="col-md-3 border-left">
                    <div class="social-media">
                        <h4 class="text-dark mb-3">&nbsp;Contact Details</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item rounded-0">
                                <span style="display:block;" class="float-left">Email:</span>
                                <span style="display:block;" class="float-right font-weight-bold text-brown"><i>example@mail.com</i></span>
                            </li>
                            <li class="list-group-item rounded-0">
                                <span style="display:block;" class="float-left">Phone:</span>
                                <span style="display:block;" class="float-right font-weight-bold text-brown"><i>+92306312012</i></span>
                            </li>
                        </ul>
                    </div>
                    <div class="contact-details mt-5">
                        <h4 class="text-dark mb-3">&nbsp;Social Media</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item rounded-0">
                                <span style="display:block;" class="float-left"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                                <span style="display:block;" class="float-right font-weight-bold text-brown"><i>facebook.com/example</i></span>
                            </li>
                            <li class="list-group-item rounded-0">
                                <span style="display:block;" class="float-left"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                <span style="display:block;" class="float-right font-weight-bold text-brown"><i>twitter.com/example</i></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="map bg-secondary">
                        <h4 class="text-center pt-5">Map</h4>
						<iframe class="image-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3603.7573393990383!2d68.2607448150139!3d25.41293208379628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x394c7967859e6e5d%3A0xc75c98bd46f3b9a0!2sUniversity+Of+Sindh+Allama+I.I+Kazi+Campus!5e0!3m2!1sen!2s!4v1545390349865" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </Section>

<?php
  include_once('inc/footer.php');
?>
	
