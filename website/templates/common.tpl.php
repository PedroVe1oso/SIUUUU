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
                    <a href="profile.php">
                        <i class="fas fa-user"></i>
                    </a>
                </ul>
            </nav>
        </header>

        <main>
<?php } ?>

<?php function drawFooter() { ?>
        </main>

        <footer>
            EatUp &copy; 3022
        </footer>
    </body>
</html>
<?php } ?>

