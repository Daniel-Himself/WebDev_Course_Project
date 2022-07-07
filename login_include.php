<?php
if (isset($_POST['login_form'])) {
    require_once 'User.php';
    $User = new User();
    $emailAddress = $_POST['user_email'];
    $emailPassword = $_POST['password'];
    if (isset($_POST['remember_me'])) {
        $rememberME = 1;
        echo $rememberME;
    } else {
        $rememberME = 0;
        echo $rememberME;
    }
    $User->users($emailAddress, '', $emailPassword, '', '');
    $result = $User->AcountLogin($User, $rememberME);
    if ($result == 'User Success') {
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
