<?php require_once('header.php');
require_once('User.php');
require_once('db.php');
$user = new User();
$db = new dbClass();
if (isset($_POST['forgotPASS']) || isset($_GET['Message1'])) {
    ?>
    <main class="login-form" id="mainElement">
        <div class="container" id="content-wrap">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Log in</div>
                        <div class="card-body">
                            <form action="checkEmail.php" method="POST">
                                <div class="form-group row">
                                    <label for="login_email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="email" id="login_email" class="form-control" name="user_email_reset" required autofocus>
                                    </div>
                                </div>

                                <?php
                                if (isset($_GET['Message1'])) {
                                    if ($_GET['Message1'] == 'LinkSent') {
                                        echo '
                                        <div class="alert alert-Success" role="alert">
                                        Check Your Email Address 
                                        </div>';
                                    } elseif ($_GET['Message1'] == 'LinkWasNotSent') {
                                        echo '
                                        <div class="alert alert-danger" role="alert">
                                        The link was not sent !!
                                        </div>';
                                    } elseif ($_GET['Message1'] == 'AcountDosentExists') {
                                        echo '
                                        <div class="alert alert-danger row justify-content-center m-0" role="alert">
                                        The Acount Dosent Exists
                                        </div>';
                                    }
                                }

                                ?>

                                <div class="col-md-6 offset-md-4">
                                    <button name='reset_form_email' type="submit" class="btn btn-primary">
                                        Send Request
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php }
if (isset($_GET['vkey']) && isset($_GET['email']) || isset($_GET['Message1'])) {
    if(isset($_POST['reset_form']))
    {
        $password = $_POST['passwordReset'];
        $Repassword = $_POST['RepasswordReset'];
        if($password != $Repassword)
        {
            header("location: ./Reset_password_include.php?Message1=PasswordDosentMatch");
            exit();
        }
        if($user->resetPasswordViaEmail($_GET['email'],$_GET['vkey'], $password))
        {
            header("location: ./login_page.php?Message1=ChangeSuccess");
            exit();
        }

    }


    ?>
    <main class="login-form" id="mainElement">
        <div class="container" id="content-wrap">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Reset Password</div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label for="login_email" class="col-md-4 col-form-label text-md-right">New-Password</label>
                                    <div class="col-md-6">
                                        <input type="text" id="login_email" class="form-control" name="passwordReset" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="login_email" class="col-md-4 col-form-label text-md-right">Re-Password</label>
                                    <div class="col-md-6">
                                        <input type="text" id="login_email" class="form-control" name="RepasswordReset" required autofocus>
                                    </div>
                                </div>
                                <?php
                                if (isset($_GET['Message1'])) {
                                    if ($_GET['Message1'] == 'PasswordDosentMatch') {
                                        echo '
                                        <div class="alert alert-danger" role="alert">
                                        Passwords Dosent Match
                                        </div>';
                                    }
                                }

                                ?>
                                <div class="col-md-6 offset-md-4">
                                    <button name='reset_form' type="submit" class="btn btn-primary">
                                        Confirm Change
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
<?php } ?>




<?php require_once('footer.php') ?>