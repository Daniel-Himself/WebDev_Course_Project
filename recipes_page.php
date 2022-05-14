<?php require_once('header.php'); ?>
<main id="mainElement">
    <div class="container p-5">

        <table class="table table-light table-hover table-bordered" id="recipes">
            <thead>
            <tr>
                <th scope="col">Recipe Name</th>
                <th scope="col">Date posted (yyyy/mm/dd)</th>
                <th scope="col">Author</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><a href="recipe-lasagna.php">Lasagna</a></td>
                <td>2022/04/04</td>
                <td>Daniel S</td>
            </tr>
            <tr>
                <td>Goulash</td>
                <td>2021/04/02</td>
                <td>Ali S</td>
            </tr>
            <tr>
                <td>Pizza</td>
                <td>2022/04/01</td>
                <td>Daniel S</td>
            </tr>
            <tr>
                <td>Cheesecake Flavoured Ice Cream</td>
                <td>2022/03/11</td>
                <td>Daniel S</td>
            </tbody>
        </table>

        <!--    Inputs to add new recipes, will be functional in HW2-->

        <!--    <div class="add_user_form">-->
        <!--      <div class="row p-5 align-items-end ">-->
        <!--        <div class="col-3">-->
        <!--          <label for="first" class="form-label">Recipe Name</label>-->
        <!--          <input type="text" class="form-control" id="first_name">-->
        <!--        </div>-->
        <!--                <div class="col-3">-->
        <!--                  <label for="last" class="form-label">שם משפחה</label>-->
        <!--                  <input type="text" class="form-control" id="last_name">-->
        <!--                </div>-->
        <!--                <div class="col-3">-->
        <!--                  <label for="last" class="form-label">טלפון</label>-->
        <!--                  <input type="tel" class="form-control" id="phone">-->
        <!--                </div>-->
        <!--        <div class="col-2">-->
        <!--          <button class="btn btn-block btn-primary" id="add_user">Add Recipe</button>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--    </div>-->
    </div>

</main>
<?php require_once('footer.php') ?>