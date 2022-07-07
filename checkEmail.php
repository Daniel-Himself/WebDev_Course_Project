<?php
require_once('User.php');
require_once('db.php');
$user = new User();
$db = new dbClass();
if (isset($_POST['reset_form_email'])) {
    $result =  $db->checkEmailIfExist($_POST['user_email_reset']);
    if ($result) {
        if ($user->SendRequestForPasswordReset($_POST['user_email_reset'])) {
            header("location: ./Reset_password_include.php?Message1=LinkSent");
            exit();
        } else
            header("location: ./Reset_password_include.php?Message1=LinkWasNotSent");
        exit();
    }
    header("location: ./Reset_password_include.php?Message1=AcountDosentExists");
    exit();
}