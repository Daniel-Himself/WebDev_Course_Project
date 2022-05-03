<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

  <!--    local css stylesheet-->
  <link rel="stylesheet" href="css/style.css">

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

  <!-- local JS file -->
  <script src="scripts.js"></script>

  <!-- Favicon -->
  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/images/favicon.ico" type="image/x-icon">

  <title>Recipes</title>
</head>
<body>
<header>
  <nav class="navbar  navbar-expand-sm navbar-light navbar-laravel fixed-top bg-light text-dark ">
    <div class="container">
      <a class="navbar-brand" href="#">Ali and Daniel's Recipe Book</a>

      <!-- TODO (broken) Code for hamburger menu that auto hides the navigation bar items on small screens-->
      <!--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
      <!--            <span class="navbar-toggler-icon"></span>-->
      <!--        </button>-->

      <!--        <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="login_page.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registration_page.php">Register</a>
        </li>
      </ul>
    </div>
  </nav>
  <!--    Add breaks so the header won't overlap the main content-->
  <br><br><br><br>
  <!-- TODO @Ali replace breaks with proper margin -->

</header>

<main>
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
        <td><a href="recipes/lasagna.php">Lasagna</a></td>
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

<footer>
  <p>Copyright &copy; 2022</p>
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>