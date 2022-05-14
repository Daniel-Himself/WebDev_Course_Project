<?php require_once("header.php"); /*TODO fix functionality after login php creates session and cookies*/
if(!isset($_SESSION['user_email'])){
    header('Location: login.php');
    exit;
}
else{
    header('Location: recipe_page.php');
}



require_once("footer.php");