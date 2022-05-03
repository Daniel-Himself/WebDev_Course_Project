<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet" type="text/css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

  <!--    local css stylesheet-->
  <link rel="stylesheet" href="/css/style.css">

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- local JS file -->
  <script src="/scripts.js"></script>

  <!-- Favicon -->
  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/images/favicon.ico" type="image/x-icon">

  <title>Lasagna</title>
</head>

<body>
<header>
  <nav class="navbar  navbar-expand-sm navbar-light navbar-laravel fixed-top bg-light text-dark ">
    <div class="container">
      <a class="navbar-brand" href="#">Ali and Daniel's Recipe Book</a>

      <!--Code for hamburger menu that auto hides the navigation bar items on small screens-->
      <!--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
      <!--            <span class="navbar-toggler-icon"></span>-->
      <!--        </button>-->

      <!--        <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/WebDev_HW1/login_page.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/WebDev_HW1/registration_page.php">Register</a>
        </li>
      </ul>
    </div>
  </nav>
  <!--    Add breaks so the header won't overlap the main content-->
  <br><br><br><br>
  <div class="wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand">Daniel's Lasagna</a>
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
  </div>
</header>
<main>
  <article class="wrapper">
    <article>

      <header>

        <figure class="figure">
          <img src="/images/lasagna.png" class="figure-img img-fluid rounded" alt="pizza"/>
          <figcaption class="figure-caption text-right">
            <small>Daniel's Lasagna</small>
          </figcaption>
        </figure>
        <br><br>
        <h1>Daniel's Amazing Lasagna Recipe</h1>
        <p class="fs-6">Homemade lasagna is the best. It tastes nothing like the ones from the frozen food aisle.
          This recipe is so good—it’s the kind of lasagna people write home about!
          It brings together all the things we love in a good pasta dish: noodles, cheeses,
          fresh herbs and a delicious meat sauce. If you’ve never made lasagna before
          or haven’t found a good recipe, you have come to the right place. Invite
          a friend because you won’t want to keep this dish to yourself!
        </p>
        <strong>Date posted: <time date="2022-04-04" pubdate>4.4.2022</time></strong>

      </header>
      <section id="mitzrahim">

        <header>

          <h2>Ingredients (8 servings):</h2>
        </header>
        <strong>For the meat sauce:</strong>
        <ul>
          <li>2 teaspoons extra virgin olive oil </li>
          <li>1 pound ground beef chuck</li>
          <li>1/2 medium onion, diced (about 3/4 cup)</li>
          <li>1/2 large bell pepper (green, red, or yellow), diced (about 3/4 cup)</li>
          <li>2 cloves garlic, minced</li>
          <li>1 (28-ounce) can good-quality tomato sauce</li>
          <li>3 ounces tomato paste (half a 6-ounce can)</li>
          <li>1 (14 ounce) can crushed tomatoes</li>
          <li>2 tablespoons chopped fresh oregano, or 2 teaspoons dried oregano</li>
          <li>1/4 cup chopped fresh parsley (preferably flat leaf), packed</li>
          <li>1 tablespoon Italian seasoning</li>
          <li>1 pinch garlic powder and/or garlic salt</li>
          <li>1 tablespoon red or white wine vinegar</li>
          <li>1 tablespoon to 1/4 cup sugar (to taste, optional)</li>
          <li>Salt</li>


        </ul>
        <strong>To assemble the lasagna:</strong>
        <ul>
          <li>1/2 pound dry lasagna noodles (requires 9 lasagna noodles - unbroken)</li>
          <li>15 ounces ricotta cheese</li>
          <li>1 1/2 pounds (24 ounces) mozzarella cheese, grated or sliced</li>
          <li>1/4 pound (4 ounces) freshly grated Parmesan cheese</li>
        </ul>
      </section>
      <section id="ofen-ahana">
        <br>
        <header>
          <h2>Method:</h2>
        </header>
        <ol>
          <li>
            <p>In a Dutch oven, cook sausage, ground beef,
              onion, and garlic over medium heat until well browned.
              Stir in crushed tomatoes, tomato paste, tomato sauce, and water.
              Season with sugar, basil, fennel seeds, Italian seasoning, 1 teaspoon salt,
              pepper, and 2 tablespoons parsley. Simmer, covered, for about 1 1/2 hours, stirring occasionally.
            </p>
          </li>
          <li>
            Bring a large pot of lightly salted water to a boil.
            Cook lasagna noodles in boiling water for 8 to 10 minutes.
            Drain noodles, and rinse with cold water. In a mixing bowl, combine ricotta
            cheese with egg, remaining parsley, and 1/2 teaspoon salt.
          </li>
          <li>
            Preheat oven to 190 degrees C.
          </li>
          <li>
            To assemble, spread 1 1/2 cups of meat sauce in the bottom of a
            9x13-inch baking dish. Arrange 6 noodles lengthwise over meat sauce.
            Spread with one half of the ricotta cheese mixture. Top with a third
            of mozzarella cheese slices. Spoon 1 1/2 cups meat sauce over mozzarella,
            and sprinkle with 1/4 cup Parmesan cheese. Repeat layers, and top with
            remaining mozzarella and Parmesan cheese. Cover with foil: to prevent
            sticking, either spray foil with cooking spray, or make sure the foil does not touch the cheese.
          </li>
          <li>
            Bake in preheated oven for 25 minutes.
            Remove foil, and bake an additional 25 minutes.
            Cool for 15 minutes before serving.
          </li>
        </ol>
      </section>
    </article>
  </article>
</main>

<footer>
  <p>Copyright &copy; 2022</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>