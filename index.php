<?php require_once("header.php");
if(!isset($_SESSION['user_email'])){
    header('Location: login.php');
    exit;
}
else{
    header('Location: recipe_page.php');
}



require_once("footer.php");