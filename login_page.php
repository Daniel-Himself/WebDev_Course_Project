<?php require_once('header.php'); ?>
<?php require_once('db.php'); ?>
    <main class="login-form" id="mainElement">
        <div class="container" id="content-wrap">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Log in</div>
                        <div class="card-body">
                            <form action="login_include.php" method="POST">
                                <div class="form-group row">
                                    <label for="login_email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="email" id="login_email" class="form-control" name="user_email" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="login_password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="login_password" class="form-control" name="password" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="1" name="remember_me"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if (isset($_GET['Message'])) {
                                    if ($_GET['Message'] == 'InvalidPassword') {
                                        echo '
                                        <div class="alert alert-danger" role="alert">
                                        Wrong Password
                                        </div>';
                                    } elseif ($_GET['Message'] == 'UserisDeactiveated') {
                                        echo '
                                        <div class="alert alert-danger" role="alert">
                                        You Need To Activate Your Email First Via Email Address
                                        </div>';
                                    } elseif ($_GET['Message'] == 'EmailWasNotFound') {
                                        echo '
                                        <div class="alert alert-warning row justify-content-center m-0" role="alert">
                                        Email Was Not Found Try Again Or SignUp
                                        </div>';
                                    }
                                }

                                ?>

                                <div class="col-md-6 offset-md-4">
                                    <button name='login_form' type="submit" class="btn btn-primary">
                                        Log in
                                    </button>

                                </div>
                            </form>
                            <div style="float: right; margin:10px; width:auto;" class="col-md-6 offset-md-4">
                                <form action="./Reset_password_include.php" method="POST">
                                    <button name="forgotPASS" type="submit" class="btn btn-outline-warning">Forgot Your Password?</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
<?php require_once('footer.php') ?>