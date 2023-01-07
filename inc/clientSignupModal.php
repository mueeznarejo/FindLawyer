<form action="inc/signup.php" method="post" id="clientSignupForm">
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
                <textarea rows="2" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="address" placeholder="Address..." required></textarea>
                <input type="text" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="phone" placeholder="Phone" title="Numbers only 0-9" minlength="11" maxlength="11" required>
            </div>
            <div class="col-md-6">
                <textarea rows="4" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="reason" placeholder="Write about your case..." required></textarea>
            </div>
            <div class="col-md-6">
                <input type="email" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="email" placeholder="Email" required>
            </div>
            <div class="col-md-6">
                <input type="password" class="form-control border-secondary bg-transparent border-0 rounded-0 mb-2" name="password" placeholder="Password" required>
            </div>
        </div>
    </div>
        <div class="modal-footer bg-light">
        <input type="submit" name="clientSignup" value="Signup" class="btn btn-block btn-dark rounded-0">
    </div>
</form>
