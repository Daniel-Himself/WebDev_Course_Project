<?php
session_start();
if (isset($_POST['addrecipe'])  && isset($_SESSION['User'])) {
    require_once 'db.php';
    $dbClass = new dbClass();
    $recipeName = $_POST['recipeName'];
    $recipeTitle = $_POST['recipeTitle'];
    $recipeMethod = $_POST['recipeMethod'];
    $recipeImage = $_FILES["image"]["name"];
    $target = "./image/" . basename($_FILES["image"]["name"]);
    $result = $dbClass->addRecipe($recipeName, $recipeTitle, $recipeMethod,$_SESSION['User'] ,$recipeImage);
    if ($result && move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
        foreach ($_POST['items'] as $item) {
            $dbClass::connect();
            $sql = "SELECT * FROM recipes WHERE recipe_name ='$recipeName'";
            $statement = $dbClass::$connection->query($sql);
            $DATA = $statement->fetch();
            $id = $DATA['id'];
            $sql = "INSERT INTO ingredients (recipe_id,recipe_ingredient ,ingredient_name) VALUES (:id , :item ,:ing)";
            $statement2 = $dbClass::$connection->prepare($sql);
            $result2 =  $statement2->execute(
                [
                    ":id" => $id,
                    ":item" => $item,
                    ":ing" => $recipeName,
                ]
            );
        }
        if ($result2) {
            header("location: ./recipes_page.php?Message=succes");
            exit();
        } else
            header("location: ./recipes_page.php?Message=sffffes");
        exit();
    }

}
if (isset($_POST['UpdateRecipe'])  && isset($_SESSION['User'])) {
    require_once 'db.php';
    $dbClass = new dbClass();
    $recipeName = $_POST['recipeNameEdit'];
    $recipeTitle = $_POST['recipeTitleEdit'];
    $recipeMethod = $_POST['recipeMethodEdit'];
    $recipeID = $_POST['hiddenDataEdit'];
    $result = $dbClass->EditRecipe($recipeName, $recipeTitle, $recipeMethod ,$recipeID);
    if ($result) {
        header("location: ./recipes_page.php?Message=UpdateSucces");
        exit();
    }
    else
        header("location: ./recipes_page.php?Message=UpdateFailed");
    exit();


}