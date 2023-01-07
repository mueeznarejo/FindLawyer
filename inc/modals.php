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
            <form action="login.php" method="post" id="Login">
              <div class="form-group">
                <input type="email" class="form-control border-brown bg-transparent text-white border-0 rounded-0" id="inputEmail" name="email" placeholder="Email Address">
              </div>
              <div class="form-group">
                <input type="password" class="form-control border-brown bg-transparent text-white border-0 rounded-0" id="inputPassword" name="password" placeholder="Password">
              </div>
              <input type="submit" name="login" value="Login" class="btn btn-block btn-dark rounded-0">
              <hr>
              <div class="forgot-password">
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
          <form action="login.php" method="post" id="Login">
            <div class="modal-body bg-light">
              <div class="form-group">
                <input type="email" class="form-control border-dark bg-transparent text-white border-0 rounded-0" id="inputEmail" name="email" placeholder="Email Address">
              </div>
              <div class="form-group">
                <input type="password" class="form-control border-dark bg-transparent text-white border-0 rounded-0" id="inputPassword" name="password" placeholder="Password">
              </div>
              <input type="submit" name="login" value="Login" class="btn btn-block btn-brown rounded-0">
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
						<form action="login.php" method="post" id="signup">
						  <div class="modal-body bg-light">
							<div class="row">
							  <div class="col-md-6">
								<input type="text" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Full Name">
							  </div>
							  <div class="col-md-6">
								<input type="text" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Caste">
							  </div>
							  <div class="col-md-6">
								<div class="form-group mb-2">
								  <label for="gender">Gender:</label>&nbsp;
								  <input type="radio" class="" id="inputgender" name="gender"> Male
								  <input type="radio" class="" id="inputgender" name="gender"> Female
								</div>
							  </div>
							  <div class="col-md-6">
								<input type="text" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="City">
							  </div>
							  <div class="col-md-6">
								<textarea rows="5" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Office Address..."></textarea>
							  </div>
							  <div class="col-md-6">
								<input type="text" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Court">
								<input type="text" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="License">
								<input type="text" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Phone">
							  </div>
							  <div class="col-md-6">
								<input type="email" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Email">
							  </div>
							  <div class="col-md-6">
								<input type="password" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Password">
							  </div>
							</div>
						  </div>
							<div class="modal-footer bg-light">
							<input type="submit" name="signup" value="Signup" class="btn btn-block btn-dark rounded-0">
						  </div>
						</form>
					</div>
					<!-- for Client sign-up -->
					<div class="tab-pane container fade" id="menu1">
						<form action="login.php" method="post" id="signup">
						  <div class="modal-body bg-light">
							<div class="row">
							  <div class="col-md-6">
								<input type="text" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Full Name">
							  </div>
							  <div class="col-md-6">
								<input type="text" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Caste">
							  </div>
							  <div class="col-md-6">
								<div class="form-group mb-2">
								  <label for="gender">Gender:</label>&nbsp;
								  <input type="radio" class="" id="inputgender" name="gender"> Male
								  <input type="radio" class="" id="inputgender" name="gender"> Female
								</div>
							  </div>
							  <div class="col-md-6">
								<input type="text" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="City">
							  </div>
							  <div class="col-md-6">
								<textarea rows="5" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Problem Address..."></textarea>
							  </div>
							  <div class="col-md-6">
								<input type="text" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Phone">
								<input type="password" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Password">
								<input type="email" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Email">
							  </div>
							</div>
						  </div>
							<div class="modal-footer bg-light">
							<input type="submit" name="signup" value="Signup" class="btn btn-block btn-dark rounded-0">
						  </div>
						</form>
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
          <form action="login.php" method="post" id="signup">
            <div class="modal-body bg-light">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Full Name">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Caste">
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-2">
                    <label for="gender">Gender:</label>&nbsp;
                    <input type="radio" class="" id="inputgender" name="gender"> Male
                    <input type="radio" class="" id="inputgender" name="gender"> Female
                  </div>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="City">
                </div>
                <div class="col-md-6">
                  <textarea rows="2" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Address..."></textarea>
                  <input type="text" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Phone">
                </div>
                <div class="col-md-6">
                  <textarea rows="4" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Purpose of visit..."></textarea>
                </div>
                <div class="col-md-6">
                  <input type="email" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Email">
                </div>
                <div class="col-md-6">
                  <input type="password" class="form-control border-secondary bg-transparent text-white border-0 rounded-0 mb-2" id="inputname" name="name" placeholder="Password">
                </div>
              </div>
            </div>
              <div class="modal-footer bg-light">
              <input type="submit" name="signup" value="Signup" class="btn btn-block btn-dark rounded-0">
            </div>
          </form>
        </div>
      </div>
    </div>
