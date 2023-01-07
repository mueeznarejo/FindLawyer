
    <!---------------------------
     Signup and login Modals of Client and Lawyer
    ----------------------------->

    <!--------------------------- Login Modals-->
    <!-- Lawyer Login Modal -->
    <div class="modal fade" id="lawyerLogin" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content rounded-0">
          <div class="modal-header">
              <img class="card-img-top rounded-circle w-25 mr-4" src="img/default.jpeg" alt="">
              <div class="panel mt-4">
                <h2 class="text-brown">Login - <span class="text-dark">Lawyer</span></h2>
                <p class="mb-0">Please enter your email and password</p>
              </div>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form action="inc/login.php" method="post" id="lawyerLoginForm">
              <div class="form-group">
                <input type="email" class="form-control border-brown bg-transparent border-0 rounded-0" name="email" placeholder="Email Address">
              </div>
              <div class="form-group">
                <input type="password" class="form-control border-brown bg-transparent border-0 rounded-0" name="password" placeholder="Password">
              </div>
              <input type="hidden" name="loginForm" value="lawyers"> <!-- Send login form of lawyer -->
              <input type="submit" name="lawyerLogin" value="Login" class="btn btn-block btn-dark rounded-0">
              <hr>
              <div class="not-account">
                <a href="#" data-toggle="modal" data-target="#lawyerSignup" class="text-dark" class="close" data-dismiss="modal" aria-label="Close">*Not have a account? Create new Account</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Client Login Modal -->
    <div class="modal fade" id="clientLogin" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content rounded-0">

          <div class="modal-header">
              <div class="panel">
                <h2 class="text-dark">Login - <span class="text-brown">To Appoint Lawyer</span></h2>
                <p class="mb-0">Please enter your email and password</p>
              </div>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="inc/login.php" method="post" id="clientLoginForm">
            <div class="modal-body bg-light">
              <div class="form-group">
                <input type="email" class="form-control border-dark bg-transparent border-0 rounded-0" name="email" placeholder="Email Address">
              </div>
              <div class="form-group">
                <input type="password" class="form-control border-dark bg-transparent border-0 rounded-0" name="password" placeholder="Password">
              </div>
              <input type="hidden" name="loginForm" value="clients"> <!-- Send login form of Client -->
              <input type="submit" name="clientLogin" value="Login" class="btn btn-block btn-brown rounded-0">
              <hr>
              <div class="forgot-password">
                  <a href="#" data-toggle="modal" data-target="#clientSignup" class="text-dark" class="close" data-dismiss="modal" aria-label="Close">*Not have a account? Create new Account</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!--------------------------- Signup Modals-->
    <!-- Lawyer Signup Modal -->
    <div class="modal fade" id="lawyerSignup" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <div class="panel">
              <h3 class="text-dark">Signup - <span class="text-brown">As Lawyer</span></h3>
              <p class="mb-0">Please complete following information:</p>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#home">Sign-up as Lawyer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#menu1">Sign-up as Client</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <!-- for Lawyer sign-up -->
            <div class="tab-pane container active" id="home">
              <form action="inc/signup.php" method="post" id="lawyerSignup">
                <div class="modal-body bg-light">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="name" placeholder="Full Name" required>
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="caste" placeholder="Caste">
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-2">
                      <label for="gender">Gender:</label>&nbsp;
                      <input type="radio" name="gender" value="Male"> Male
                      <input type="radio" name="gender" value="Female"> Female
                    </div>
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="city" placeholder="City" required>
                  </div>
                  <div class="col-md-6">
                    <textarea rows="5" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="office_add" placeholder="Office Address..." required></textarea>
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="court" placeholder="Court" required>
                    <input type="text" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="license" placeholder="License" required>
                    <input type="text" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="phone" placeholder="Phone" title="Numbers only 0-9" minlength="11" maxlength="11" required>
                  </div>
                  <div class="col-md-6">
                    <input type="email" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="email" placeholder="Email" required>
                  </div>
                  <div class="col-md-6">
                    <input type="password" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                  </div>
                </div>
                </div>
                <div class="modal-footer bg-light">
                <input type="submit" name="lawyerSignup" value="Signup" class="btn btn-block btn-dark rounded-0">
                </div>
              </form>
            </div>

            <!-- for Client sign-up -->
            <div class="tab-pane container fade" id="menu1">
              <?php include('clientSignupModal.php'); ?>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Client Signup Modal -->
    <div class="modal fade" id="clientSignup" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <div class="panel">
              <h3 class="text-dark">Signup - <span class="text-brown">To Appoint Lawyer</span></h3>
              <p class="mb-0">Please complete following information:</p>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php include('clientSignupModal.php'); ?>
        </div>
      </div>
    </div>
    <!---------------------------Modals Ends here------------------------------->

    <footer class="py-3 bg-dark">
      <div class="iner">
        <h6 class="m-0 p-0 text-center text-white">&copy; Copyright Mushtaque & Faraz.</h6>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script>

    $(document).ready(function(){
     $('#lawyer_city').typeahead({
      source: function(query, result)
      {
       $.ajax({
        url:"inc/fetch_city.php",
        method:"POST",
        data:{query:query},
        dataType:"json",
        success:function(data)
        {
         result($.map(data, function(item){
          return item;
         }));
        }
       })
      }
     });

    });

    $(document).ready(function(){
     $('#lawyer_court').typeahead({
      source: function(query, result)
      {
       $.ajax({
        url:"inc/fetch_court.php",
        method:"POST",
        data:{query:query},
        dataType:"json",
        success:function(data)
        {
         result($.map(data, function(item){
          return item;
         }));
        }
       })
      }
     });

    });


    $(document).ready(function(){
      $('#laywer_submit').click(function(){
       var lawyer_city = $('#lawyer_city').val();
       var lawyer_court = $('#lawyer_court').val();
       $("form").trigger("reset");
        $.ajax({
         type: 'POST',
         url: 'inc/fetch_results.php',
         data: {lawyer_city:lawyer_city, lawyer_court:lawyer_court},
         success: function(response) {
            $('#load_data').html('');
            $('#searchResult').html('Your searched results:');
            // Automatic scroll down to message 
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
            $('#load_data').html(response);
          }
        });
      });
 });
      ///////////// Message script start here
      $(document).ready(function(){

        $("#messageForm").submit(function(event) {
          event.preventDefault();
          var client_id = $("#client_id").val();
          var lawyer_id = $("#lawyer_id").val();
          var send_by = $("#send_by").val();
          var msg = $("#msg").val();
          var msg_btn = $("#msg_btn").val();
          $.post("inc/message.php", {
            client_id: client_id,
            lawyer_id: lawyer_id,
            send_by: send_by,
            msg: msg,
            msg_btn: msg_btn
          });
          $("#msg").val('');
          //load Message
          setInterval(function(){
            $("#message").load("inc/load-message.php");
            // Automatic scroll down
            $('#message').animate({
                scrollTop: $('#message').get(0).scrollHeight
            }, 0);
          }, 2000);
        });
        
        // Automatic scroll down
        $('#message').animate({
            scrollTop: $('#message').get(0).scrollHeight
        }, 0);
        // load message
        setInterval(function(){
          $("#message").load("inc/load-message.php");
        }, 2000);

      });
      ///////////// Message script ends here

    </script>

    <script>
        $(document).ready(function(){

          // To hide alert after some seconds
          $(".alert").fadeTo(2000, 2000).slideUp(1000, function(){
              $(".alert").slideUp(1000);
          });

          <?php echo @$_SESSION['disabledDiv']; ?>

        });
    </script>
  </body>
</html>
