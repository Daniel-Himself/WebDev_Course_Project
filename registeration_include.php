<?php


if (isset($_POST['submit']) ) {
    require_once 'User.php';
    $SignUpUser = new User();
    $e = $_POST['registration_email'];
    $u = $_POST['registration_username'];
    $p = $_POST['registration_password'];
    $p2 = $_POST['password_repeat'];
    $SignUpUser->users($e, $u, $p, $p2, '0');
    if ($p != $p2) {
        header("location: ./registration_page.php?Message=passwordsDosentMatch");
        exit();
    }

    $checkEmailIfExist = $SignUpUser->CheckEmail($SignUpUser);
    if ($checkEmailIfExist) {
        header("location: ./registration_page.php?Message=EmailAlreadyExists");
        exit();
    }
    $CreatUser = $SignUpUser->CreateUser($SignUpUser);
    if ($CreatUser) {
        if ($SignUpUser->SendAnEmailForVerifaction($e)) {
            header("location: ./registration_page.php?Message=EmailVerificationSent");
            exit();
        } else {
            header("location: ./registration_page.php?Message=EmailVerificationWasNOTSent");
            exit();
        }
    } else {
        header("location: ./registration_page.php?Message=SmthWrongHappened");
        exit();
    }
}
