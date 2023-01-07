<?php 
  include_once('inc/top.php');
?> 

    <!-- Carousel -->
    <header style="background-image: url(img/bg6.jpg);">
        <div class="container">
            <div class="jumbotron bg-transparent">
                <h1 class="display-3 text-white">Need help ask any question?</h1>
                <p class="lead text-warning">We will give the reply at your email soon.</p>
            </div>
        </div>
    </header>
    
    <Section id="containers" class="py-5">
        <div class="container">
            <div class="row no-gutters justify-content-between">
                <div class="col-md-8">
                    <form action="ask.php" method="post" id="ask">
                        <input type="text" class="form-control border-brown bg-transparent border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Name" required>
                        <input type="email" class="form-control border-brown bg-transparent border-0 rounded-0 mb-2" id="inputname" name="email" placeholder="Email" required>
                        <input type="text" class="form-control border-brown bg-transparent border-0 rounded-0 mb-2" id="inputname" name="subject" placeholder="Subject">
                        <textarea rows="5" class="form-control border-brown bg-transparent border-0 rounded-0 mb-2" id="inputname" name="msg" placeholder="Your message / question ?" required></textarea>
                        <hr>
                        <input type="submit" name="ask" value="Submit" class="btn btn-block btn-dark rounded-0">
                    </form>
                    <?php
                      if(isset($_POST['ask'])){
                        // Variables from form
                        $name = filter($conn, $_POST['name']);
                        $email = filter($conn, $_POST['email']);
                        $subject = filter($conn, $_POST['subject']);
                        $msg = filter($conn, $_POST['msg']);

                        // Query
                        $sql = "INSERT INTO `admin_msg`(`name`, `email`, `subject`, `msg`)VALUES('$name', '$email', '$subject', '$msg')";
                        $run = mysqli_query($conn, $sql);
                        // Check query
                        if(!$run){
                          echo 'Failed to send message:'.mysqli_error($conn);
                        }else{
                            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Your message has sent. </strong>Successfully
                            </div>';
                          header('location: ask.php');
                        }
                      }
                    ?>
                </div>
                <div class="col-md-3">
                    <div class="ad bg-secondary w-100 h-100">
                    <img src="img/gif.gif"/>
                  </div>
                </div>
            </div>
        </div>
    </Section>
    
<?php
  include_once('inc/footer.php');
?> `