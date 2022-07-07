<?php
session_start();
session_destroy();
setcookie("user_email", $_cookie["user_email"], time() - 1);
header('Location: login_page.php');
exit;