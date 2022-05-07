<?php require_once('header.php'); ?>

<main class="login-form">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Sign Up</div>
          <div class="card-body">

            <!-- BIGENING OF FORM  -->
            <form>
              <div class="form-group row">
                <label for="registration_email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                <div class="col-md-6">
                  <input type="email" id="registration_email" class="form-control" name="registration_email" required autofocus>
                </div>
              </div>

              <!-- User Name -->
              <div class="form-group row">
                <label for="registration_username" class="col-md-4 col-form-label text-md-right">User Name</label>
                <div class="col-md-6">
                  <input type="text" id="registration_username" class="form-control" name="registration_username" required autofocus>
                </div>
              </div>

              <!-- Password -->
              <div class="form-group row">
                <label for="registration_password" class="col-md-4 col-form-label text-md-right">Password</label>
                <div class="col-md-6">
                  <input type="password" id="registration_password" class="form-control" name="registration_password" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="password_repeat" class="col-md-4 col-form-label text-md-right">Repeat Password</label>
                <div class="col-md-6">
                  <input type="password" id="password_repeat" class="form-control" name="password_repeat" required>
                </div>
              </div>

              <!-- <div class="form-group row">
                <input
                  class="form-check-input me-2"
                  type="checkbox"
                  value=""
                  id="form2Example3cg"
                />
                <label class="form-check-label" for="form2Example3g">
                  I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                </label>
              </div> -->

              <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember"> I agree all statements in <a href="#" class="text-body"><u>Terms of service</u></a>
                    </label>
                  </div>
                </div>
              </div>

              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  Sign Up
                </button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

</main>
<br><br>
<footer>
  <p>Copyright &copy; 2022</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>