<?php require_once("header.php"); ?>

<?php if(!isset($_SESSION['user_email'])){
    header('Location: login_page.php');
    exit;
}
else{
    header('Location: recipes_page.php');
}
?>

<?php require_once("footer.php"); ?>