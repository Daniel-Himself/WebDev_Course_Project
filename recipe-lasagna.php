<?php require_once('header.php');
if (isset($_GET['message'])) {
    require_once('db.php');
    $db = new dbClass();
    $RECIPE_DATA = $db->FetchDataViaID($_GET['message']);
    $INGREDIENT_DATA = $db->FetchIngredientDataViaID($_GET['message']);
    $INGREDIENT_COUNT = $db->FetchIngredientCOUNTViaID($_GET['message']);
}
?>

    <main id="mainElement">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mr-5 ml-5">
            <div class="container-fluid">
                <a class="navbar-brand">Recipe Page</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#mitzrahim">Ingredients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ofen-ahana">Method</a>
                    </li>
                    <li class="nav-item">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#share_modal">Share</button>

                        <!-- Modal -->
                        <div class="modal fade" id="share_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Share Recipe</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                                <input type="text" class="form-control" id="recipient-name">
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Send message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </ul>
            </div>
        </nav>
        <article class="wrapper">
            <article>

                <header>
                    <figure class="figure">
                        <img src="./image/<?php echo $RECIPE_DATA['recipe_image'] ?>" class="img-fluid" alt="pizza" />
                        <figcaption class="figure-caption text-right">
                            <small>Final result. Yum!</small>
                        </figcaption>
                    </figure>
                    <br><br>
                    <h1><?php echo $RECIPE_DATA['recipe_name']; ?> Recipe</h1>
                    <p class="fs-6"><?php echo $RECIPE_DATA['recipe_title'] ?>
                    </p>
                    <strong>Date posted: <time date="2022-04-04" pubdate><?php echo $RECIPE_DATA['dateAdded']; ?></time></strong>

                </header>
                <section id="mitzrahim">

                    <header>
                        <br>
                        <h2>Ingredients:</h2>
                    </header>
                    <?php
                    if ($INGREDIENT_DATA) {
                        foreach ($INGREDIENT_DATA as $ING) {
                            ?>
                            <div>
                                <input type="checkbox" id="lasagna-oil" name="lasagna-oil">
                                <label for="lasagna-oil" class="checkbox"><?php echo $ING['recipe_ingredient'] ?>
                            </div>
                            <?php
                        }
                    }

                    ?>

                </section>
                <section id="ofen-ahana">
                    <br>
                    <header>
                        <h2>Instructions:</h2>
                    </header>
                    <p><?php
                        $seperatedstring = explode("\n", $RECIPE_DATA['recipe_method']);
                        foreach ($seperatedstring as $string) {
                            echo $string . "<br>";
                        }
                        //echo $RECIPE_DATA['recipe_method']
                        ?>
                    </p>
                </section>
            </article>
        </article>
    </main>

<?php require_once('staticFooter.php') ?>