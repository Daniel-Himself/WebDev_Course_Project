<?php require_once('header.php'); ?>
<?php
$error=NULL;
if(isset($_POST['submhhit'])) {
    //Get form data
    $e = $_POST['registration_email'];
    $u = $_POST['registration_username'];
    $p = $_POST['registration_password'];
    $p2 = $_POST['password_repeat'];

    if ($p != $p2) {
        $error .= "Passwords do not match";
    } else {
        require('db.php');

        // below caode as
//        // Form is valid, connect to database
//        $mysqli = new mysqli("localhost", "root", "", "project");
//        if ($mysqli->connect_error) {
//            echo "<h2>error connecting to db</h2>";
//            die();
//        }

        // Sanitize form data
        $e = $mysqli->real_escape_string($e);
        $u = $mysqli->real_escape_string($u);
        $p = $mysqli->real_escape_string($p);
        $p2 = $mysqli->real_escape_string($p2);

        // Generate verification key
        $vkey = md5(time() . $e); // encrypted value of the current timestamp with the user email
        // encrypt the password
        $p = md5($p);

        // Insert user into database
        $insert = $mysqli->query("INSERT INTO users (email, username, password, vkey) VALUES ('$e', '$u', '$p', '$vkey')");
        if ($insert) {
            // Send email
            $to = $e;
            $subject = "Verify your account";
            $message = "Please click the link below to verify your account: <a href='http://localhost/project/verify.php?vkey=$vkey'>Verify Account</a>";
            $headers = "From: dsharo10@campus.haifa.ac.il \r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            mail($to, $subject, $message, $headers);

            header('location:thankyou.php');

        } elseif ($insert->num_rows > 0) {
            // Check if user already exists
            echo "User already exists";
        } else {
            echo $mysqli->error;
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
                            <form action="registeration_include.php" method="POST">
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
                                <?php
                                if(isset($_GET['Message']))
                                {
                                    if($_GET['Message'] == 'passwordsDosentMatch')
                                    {
                                        echo '
                                        <div class="alert alert-danger" role="alert">
                                        Passwords Dosent Match
                                        </div>' ;
                                    }
                                    elseif($_GET['Message'] == 'EmailAlreadyExists')
                                    {
                                        echo '
                                        <div class="alert alert-danger" role="alert">
                                        The Email Address Already Exists
                                        </div>' ;
                                    }
                                    elseif($_GET['Message'] == 'EmailVerificationSent')
                                    {
                                        echo '
                                        <div class="alert alert-danger" role="alert">
                                        Email Verification Sent Via Email Address
                                        </div>' ;
                                    }
                                    elseif($_GET['Message'] == 'EmailVerificationWasNOTSent')
                                    {
                                        echo '
                                        <div class="alert alert-danger" role="alert">
                                        Email Verification Was Not  Sent !!
                                        </div>' ;
                                    }
                                }

                                ?>
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