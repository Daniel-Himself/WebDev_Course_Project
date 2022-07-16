<?php require_once('header.php'); ?>
<?php require_once('db.php'); ?>
<?php require('connect_to_db.php'); ?>

<?php
$email = $_GET["secret"];
$sql = "SELECT * FROM `users` WHERE email='$email'";
$results =  $mysqli->query($sql);
if ($results->num_rows < 0) {
    die("קוד משתמש לא נכון");
}

if(isset($_POST['restore_password'])) {
    $email = $_POST['email'];
    $newpassword = $_POST['password'];
    $sql = "UPDATE `users` SET `password`='$newpassword' WHERE email = '$email'";
    $results =  $mysqli->query($sql);
    if ($results) {
        echo "<br><br><br><br><br><br>Password was reset successfully";
    } else {
        echo "<br><br><br><br><br><br>Failed to reset password";
        echo $mysqli->error;
    }
}
?>
<form method="post">
    <br><br><br><br><br><br>
    <label for="email">Email Address</label>
    <input id="email" name="email" type="email"/>
    <label for="password">New Password</label>
    <input id="password" name="password" type="password"/>
    <input type="submit" name="restore_password" value="Reset Password"/>
</form>

<?php require_once('footer.php'); ?>