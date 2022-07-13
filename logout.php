<?php
session_start();
session_destroy();
if($_COOKIE['remember_me'] != "true"){
    setcookie("user_email", $_COOKIE["user_email"], time() - 1);
}
header('Location: login_page.php');
exit;