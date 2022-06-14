<?php
declare(strict_types = 1);

require_once(__DIR__ . '/../includes/classes/Session.php');
?>

<?php function drawHeader(Session $session) { ?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Welcome to EatUp</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="/website/css/style.css">
        <link rel="stylesheet" type="text/css" href="/website/css/navbar.css">
        <link rel="stylesheet" type="text/css" href="/website/css/signUpIn.css">
        <script src="https://kit.fontawesome.com/3b04e89a84.js" crossorigin="anonymous"></script>
    </head>
    <body>

        <header>
            <nav class="navBar">
                <div class="logoContainer">
                    <a href="index.php">
                        <img src="/website/assets/images/logo.png" alt="Eat Up Logo">
                    </a>
                </div>

                <ul class="navLinks">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php">Categories</a></li>
                    <li><a href="index.php">Restaurants</a></li>
                    <li><a href="index.php">Dishes</a></li>
                </ul>

                <ul class="rightItems">
                    <a href="search.php">
                        <i class="fas fa-search"></i>
                    </a>
                    <?php
                    if ($session->isLoggedIn()) drawLogoutForm($session);
                    else drawLoginIcon($session);
                    ?>

<!--                    <a href="login.php">-->
<!--                        <i class="fas fa-sign-in"></i>-->
<!--                    </a>-->
                </ul>
            </nav>
        </header>

        <main>
<?php } ?>

<?php function drawFooter() { ?>
        </main>

        <footer>
            <p>EatUp &copy; 2022-<?php $today = date("Y"); echo $today?></p>
        </footer>
    </body>
</html>
<?php } ?>

<?php function drawLoginIcon() { ?>
    <a href="./pages/login.php">
        <i class="fas fa-sign-in"></i>
    </a>
<?php } ?>

<?php function drawLoginForm() { ?>
    <section class="signUpAndInContainer">
        <div class="signInContainer">
            <div class="header">
                <h1>Sign In</h1>
                <h2>Welcome.</h2>
            </div>
            <form action="../actions/action_login.php" method="POST">
                <div class="userDetails">
                    <input type="text" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="logInButton">
                    <input type="submit" name="submitButton" value="Log In">
                </div>
            </form>
            <div class="divide"></div>
            <div class="registerButton">
                <button onclick="document.location='register.php'">Create new account</button>
            </div>
        </div>
    </section>
<?php } ?>

<?php function drawLogoutForm(Session $session) { ?>
    <form action="../actions/action_logout.php" method="post" class="logoutContainer">
        <a href="profile.php">
            <i class="fas fa-user"></i>
        </a>
        <button type="submit">
            <i class="fas fa-sign-out"></i>
        </button>
    </form>
<?php } ?>

