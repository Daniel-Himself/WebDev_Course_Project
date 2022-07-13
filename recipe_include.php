<?php

if (isset($_POST['deleteButton'])) {
    require_once('db.php');
    $db = new dbClass();
    $recipe_ID = $_POST['hiddenData'];
    $result = $db->DeleteRecipe($recipe_ID);
    if ($result) {
        header("location: ./recipes_page.php?Message=RecipeDeletedSuccess");
        exit();
    } else {
        header("location: ./recipes_page.php?Message=RecipeWasNotDeleted");
        exit();
    }
}