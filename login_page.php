<?php require_once('header.php'); ?>
<?php if (isset($_cookie["login_email"])) {
    $_SESSION["login_email"] = $_cookie["login_email"];
    header("location: index.php");
    exit;
} ?>
    <main class="login-form" id="mainElement">
        <div class="container" id="content-wrap">
            <?php
            if(isset($_POST['login_form'])) {
                if (isset($users[$_POST['login_email']])){
                    if ($users[$_POST['login_email']]["password"] === $_POST['password'] ) {
                        if ($_POST['remember_me']==="1") {
                            setcookie("login_email", $_POST['login_email'], time()+60*60*24*7);
                        }
                        $_SESSION["login_email"] = $_POST['login_email'];
                        header('Location: recipes_page.php');
                        exit;
                    } else { ?>
                        <div class="alert alert-danger" role="alert">
                            Wrong Password
                        </div>
                        <?php
                    }
                } else { ?>

                    <div class="col-md-8">
                        <div class="alert alert-warning row justify-content-center m-0" role="alert">
                            Email not found
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Log in</div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group row">
                                    <label for="login_email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="email" id="login_email" class="form-control" name="login_email" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="login_password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="login_password" class="form-control" name="login_password" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="1" name="remember_me"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button name='login_form' type="submit" class="btn btn-primary">
                                        Log in
                                    </button>
                                    <a href="#" class="btn btn-link">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
<?php require_once ('footer.php')?>