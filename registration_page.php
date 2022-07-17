<?php require_once('header.php'); ?>
<?php
$error=NULL;
if(isset($_POST['submit'])) {
    //Get form data
    $e = $_POST['registration_email'];
    $u = $_POST['registration_username'];
    $p = $_POST['registration_password'];
    $p2 = $_POST['password_repeat'];

    if ($p != $p2) {
        $error .= "Passwords do not match";
        echo '<br><br><br><br><div class="alert alert-danger" role="alert">'.$error.'</div>';
    } else {
        require('db.php');

        // Form is valid, connect to database
        require('connect_to_db.php');

        // Sanitize form data
        $e = $mysqli->real_escape_string($e);
        $u = $mysqli->real_escape_string($u);
        $p = $mysqli->real_escape_string($p);
        $p2 = $mysqli->real_escape_string($p2);

        // Generate verification key
        $vkey = md5(time() . $e); // encrypted value of the current timestamp with the user email

        // Insert user into database
        $insert = $mysqli->query("INSERT INTO users (email, username, password, vkey) VALUES ('$e', '$u', '$p', '$vkey')");

        if ($insert) {
            $link="location:thankyou.php?vkey=$vkey";
            header($link); // redirect to thank you page

        } else {
//            echo $mysqli->error;
            echo '<br><br><br><br><div class="alert alert-danger" role="alert">'.$mysqli->error.'</div>';
        }
    }
}
?>
    <main class="login-form" id="mainElement">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Sign Up</div>
                        <div class="card-body">

                            <!-- BEGINNING OF FORM  -->
                            <form method="POST">
                                <div class="form-group row">
                                    <label for="registration_email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="email" id="registration_email" class="form-control"
                                               name="registration_email" required autofocus>
                                    </div>
                                </div>

                                <!-- User Name -->
                                <div class="form-group row">
                                    <label for="registration_username" class="col-md-4 col-form-label text-md-right">User Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="registration_username" class="form-control"
                                               name="registration_username" required autofocus>
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="form-group row">
                                    <label for="registration_password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="registration_password" class="form-control"
                                               name="registration_password" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password_repeat" class="col-md-4 col-form-label text-md-right">Repeat Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password_repeat" class="form-control"
                                               name="password_repeat" required>
                                    </div>
                                </div>
                                <!--                                --><?php // obsolete block, safe to remove
                                //                                if(isset($_GET['Message']))
                                //                                {
                                //                                    if($_GET['Message'] == 'passwordsDosentMatch')
                                //                                    {
                                //                                        echo '
                                //                                        <div class="alert alert-danger" role="alert">
                                //                                        Passwords do not match
                                //                                        </div>' ;
                                //                                    }
                                //                                    elseif($_GET['Message'] == 'EmailAlreadyExists')
                                //                                    {
                                //                                        echo '
                                //                                        <div class="alert alert-danger" role="alert">
                                //                                        The Email address is already in use
                                //                                        </div>' ;
                                //                                    }
                                //                                    elseif($_GET['Message'] == 'EmailVerificationSent')
                                //                                    {
                                ////                                        echo '
                                ////                                        <div class="alert alert-danger" role="alert">
                                ////                                        Email Verification Sent
                                ////                                        </div>' ;
                                //                                        $link="location:thankyou.php?vkey=$vkey";
                                //                                        header($link); // redirect to thank you page
                                //                                    }
                                //                                    elseif($_GET['Message'] == 'EmailVerificationWasNOTSent')
                                //                                    {
                                //                                        echo '
                                //                                        <div class="alert alert-danger" role="alert">
                                //                                        An error occured while trying to send the verification message
                                //                                        </div>' ;
                                //                                    }
                                //                                }
                                //
                                //                                ?>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>
<?php require_once('footer.php') ?>