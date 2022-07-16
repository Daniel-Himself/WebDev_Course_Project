<?php require_once('header.php'); ?>
<?php require_once('db.php'); ?>
<?php require('connect_to_db.php'); ?>

<?php
$email = $_GET["secret"];
$sql = "SELECT * FROM `users` WHERE email='$email'";
$results =  $mysqli->query($sql);
if ($results->num_rows < 0) {
    die("No user found for given email address");
}

if(isset($_POST['restore_password'])) {
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
<form id=mainElement method="post">
    <label for="password">New password for <?php echo $_GET["secret"];?></label>
    <input id="password" name="password" type="password"/>
    <input type="submit" name="restore_password" value="Reset Password"/>
</form>

<?php require_once('footer.php'); ?>