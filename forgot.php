<?php require_once('header.php'); ?>
<?php require_once('db.php'); ?>
<?php require('connect_to_db.php'); ?>

<?php function create_restore_password_link($email): string
{
    // echo "http://localhost/folderFile/restore.php?secret=$email";
    // return "http://localhost/tirugl_12_forget_password/restore.php?secret=$email";

    return "./restore.php?secret=$email";
} ?>

<?php
if (isset($_POST['forgot_password'])) {
    $email = $_POST['email'];
    // $user_password = $_POST['user_password'];
    $sql = "SELECT * FROM `users` WHERE email='$email'";
    $results =  $mysqli->query($sql);
    if ($results->num_rows > 0) {
        // echo "user found";
        echo "<p>מייל לשחזור סיסמה</p>";
        $restore_url = create_restore_password_link($email);
        echo "<a href='$restore_url'>לחץ כאן לאיפוס סיסמה</a>";
    } else {
        echo "<br><br><br><br><br><br>".$mysqli->error;
        echo "user not found";
    }
}

if (isset($_POST['forgotPASS']) || isset($_GET['Message1'])) {
?>
<main class="login-form" id="mainElement">
    <div class="container" id="content-wrap">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" id="login_email" class="form-control" name="email" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button name='forgot_password' type="submit" class="btn btn-primary">
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
require_once('footer.php'); ?>