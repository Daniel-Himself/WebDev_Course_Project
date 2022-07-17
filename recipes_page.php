<?php require_once('header.php');
require_once('db.php');
$db = new dbClass();
$Data = $db->FetchData();
if(isset($_COOKIE['user_email']) || isset($_SESSION['User']))
{
    ?>
    <main id="mainElement">
        <div class="container p-5">

            <table class="table table-light table-hover table-bordered" id="recipes">
                <thead>
                <tr>
                    <th scope="col">Recipe Name</th>
                    <th scope="col">Date posted (yyyy/mm/dd)</th>
                    <th scope="col">Author</th>
                    <th scope="col">Status</th>

                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($Data as $DataType) {
                    ?>
                    <tr>
                        <td><a href="recipe-lasagna.php?message=<?php echo $DataType['id'] ?>"><?php echo $DataType['recipe_name'] ?></a></td>
                        <td><?php echo $DataType['dateAdded'] ?></td>
                        <td><?php echo $DataType['Aothur'] ?></td>
                        <td>
                            <?php

                            if (isset($_SESSION['user_email']) && $DataType['Aothur'] == $_SESSION['user_email']) { ?>
                                <form action="" method="POST">
                                    <button name="editButton" class="btn btn-block btn-outline-warning" id="add_user">Edit Recipe</button>
                                    <input type="hidden" name="hiddenDataEdit" value="<?php echo $DataType['id'] ?>">
                                </form>
                                <form action="recipe_include.php" method="POST">
                                    <button onclick="return confirm('Are you sure you want to delete this item?');"
                                            type="submit" name="deleteButton" class="btn btn-block btn-outline-danger" id="add_user">Delete Recipe</button>
                                    <input type="hidden" name="hiddenData" value="<?php echo $DataType['id'] ?>">
                                </form>
                            <?php } else {
                                ?>
                                Only the author can edit or delete this recipe

                            <?php } ?>
                        </td>

                    </tr>
                <?php } ?>

                </tbody>
            </table>

            <?php
            if (isset($_POST['editButton'])) {
                $editData = $db->FetchDataViaID($_POST['hiddenDataEdit']);
                ?>
                <div class="add_user_form">
                    <form action="addRecipe_include.php" method="POST">
                        <div class="row p-5 align-items-end ">
                            <div class="row-1col-3">
                                <label for="first" class="form-label">Recipe Name</label>
                                <input name="recipeNameEdit" required type="text" class="form-control" id="first_name" value="<?php echo $editData['recipe_name']?>">
                            </div>
                            <div class="row-3col-3">
                                <br>
                                <label for="last" class="form-label">Recipe Title</label>
                                <input name="recipeTitleEdit" required type="text" class="form-control" id="title" value="<?php echo $editData['recipe_title']?>">
                            </div>
                            <br>
                            <div class="row-3col-3">
                                <label for="last" class="form-label">Recipe method</label>
                                <textarea class="form-control" name="recipeMethodEdit" cols="40" rows="5"><?php echo $editData['recipe_method']?></textarea>
                            </div>
                            <div style="padding:30px;" class="row-4col-2">
                                <button class="btn btn-block btn-primary" name="UpdateRecipe" id="add_user">Update Recipe</button>
                                <input type="hidden" name="hiddenDataEdit" value="<?php echo $editData['id'] ?>">

                            </div>

                        </div>
                    </form>
                </div>

            <?php } else { ?>

                <div class="add_user_form">
                    <form action="addRecipe_include.php" enctype="multipart/form-data" method="POST">
                        <div class="row p-5 align-items-end ">
                            <div class="row-1col-3">
                                <label for="first" class="form-label">Recipe Name</label>
                                <input name="recipeName" required type="text" class="form-control" id="first_name">
                                <br>
                            </div>
                            <div class="row-3col-3">    
                                <label for="last" class="form-label pt-1">Short summary</label>
                                <input name="recipeTitle" required type="text" class="form-control" id="title">
                                <br>
                            </div>
                            <div class="row-3col-3">
                                <label for="last" class="form-label">Recipe method</label>
                                <textarea class="form-control" name="recipeMethod" cols="40" rows="5"></textarea>
                                <br>
                            </div>
                            <div class='row-3col-3'>
                                <label for='last' class='form-label'>Ingredient</label>
                                <input required type='tel' name='items[]' value='' class='form-control'>
                            </div>
                            <div id="tbody0"></div>
                            <div id="tbody1"></div>
                            <div id="tbody2"></div>
                            <div id="tbody3"></div>
                            <div id="tbody4"></div>
                            <div id="tbody5"></div>
                            <div id="tbody6"></div>
                            <div id="tbody7"></div>
                            <div class='row-3col-3'>
                                <div style="padding:30px;" class="row-4col-2">
                                    <button type="button" onclick="addItem();" class="btn btn-block btn-secondary">Add Another Ingredient</button>
                                    <br>
                                </div>
                                <label for='last' class='form-label'>Recipe Image</label>
                                <input class='form-control' required type="file" name="image" placeholder="Product Image" />
                            </div>

                            <div style="padding:30px;" class="row-4col-2">
                                <button class="btn btn-block btn-primary" name="addrecipe" id="add_user">Add Recipe</button>
                            </div>

                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
        <script>
            var items = 0;

            function addItem() {
                items++;
                var html = "<div class='row-3col-3'>";
                html += " <label for='last' class='form-label'>ingredient</label>";
                html += "<input required type='tel' name='items[]' value='' class='form-control'>";
                html += "</div>";
                document.getElementById("tbody" + items + "").innerHTML = html;

            }
        </script>

    </main>
<?php } require_once('staticFooter.php') ?>