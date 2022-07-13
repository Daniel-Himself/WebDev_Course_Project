<?php
if (isset($_POST['login_form'])) {
    require('connect_to_db.php');
    require_once 'User.php';
    $User = new User();
    $email = $_POST['user_email'];
    $password = $_POST['password'];
    if (isset($_POST['remember_me'])) {
        $rememberME = 1;
    } else {
        $rememberME = 0;
    }
    $User->users($email, '', $password, '', '');
    $result = $User->AcountLogin($User, $rememberME);
    if ($result == 'User Success') {
        $_SESSION['user_email'] = $email;
        $_SESSION['user']=$User;
        header("location: ./recipes_page.php?Message=Success");
        exit();
    }
    if ($result == 'User invalid password') {
        header("location: ./login_page.php?Message=InvalidPassword");
        exit();
    }
    if ($result == 'User is Deactiveated') {
        header("location: ./login_page.php?Message=UserisDeactiveated");
        exit();
    }
    if ($result == 'Email Was Not Found') {
        header("location: ./login_page.php?Message=EmailWasNotFound");
        exit();
    }
}