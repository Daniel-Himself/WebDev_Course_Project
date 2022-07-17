<?php require_once("header.php"); ?>
<?php require_once('db.php'); ?>

<?php if(isset($_COOKIE["user_email"])){
    $_SESSION["user_email"] = $_COOKIE["user_email"];
    header("location: ./recipes_page.php");
}
if(!isset($_SESSION['user_email'])){
    header('Location: login_page.php');
    exit;
}
else{
    header('Location: recipes_page.php');
}
?>

<?php require_once("footer.php"); ?>