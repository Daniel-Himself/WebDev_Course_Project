<?php require_once('header.php'); ?>

<main id="mainElement">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mr-5 ml-5">
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
            <br>

          <h2>Ingredients (8 servings):</h2>
        </header>
        <strong>For the meat sauce:</strong>
          <div>
          <input type="checkbox" id="lasagna-oil" name="lasagna-oil">
              <label for="lasagna-oil" class="checkbox">2 teaspoons extra virgin olive oil
          </div>
          <div>
          <input type="checkbox" id="lasagna-onion" name="lasagna-onion">
              <label for="lasagna-onion" class="checkbox">1/2 medium onion, diced (about 3/4 cup)</label>
          </div>
          <div>
          <input type="checkbox" id="lasagna-garlic" name="lasagna-garlic">
              <label for="lasagna-garlic" class="checkbox">2 cloves garlic, minced</label>
          </div>
          <div>
          <input type="checkbox" id="lasagna-oregano" name="lasagna-oregano">
              <label for="lasagna-oregano" class="checkbox">1 teaspoon dried oregano</label>
          </div>
          <div>
          <input type="checkbox" id="lasagna-beef" name="lasagna-beef">
              <label for="lasagna-beef" class="checkbox">1 pound ground beef chuck/label>
          </div>
          <div>
          <input type="checkbox" id="lasagna-pepper" name="lasagna-pepper">
              <label for="lasagna-pepper" class="checkbox">1/2 large bell pepper (green, red, or yellow), diced (about 3/4 cup)</label>
          </div>

        <strong>To assemble the lasagna:</strong>
          <div>
          <input type="checkbox" id="lasagna-noodles" name="lasagna-noodles">
              <label for="lasagna-noodles" class="checkbox">1/2 pound dried lasagna noodles</label>
          </div>
          <div>
          <input type="checkbox" id="lasagna-ricotta" name="lasagna-ricotta">
              <label for="lasagna-ricotta" class="checkbox">15 ounces ricotta cheese</label>
          </div>
          <div>
          <input type="checkbox" id="lasagna-mozzarella" name="lasagna-mozzarella">
              <label for="lasagna-mozzarella" class="checkbox">1/2 cup mozzarella cheese</label>
          </div>
          <div>
          <input type="checkbox" id="lasagna-parmesan" name="lasagna-parmesan">
              <label for="lasagna-parmesan" class="checkbox">1/2 cup freshly grated Parmesan cheese</label>
          </div>
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

<?php require_once('footer.php') ?>