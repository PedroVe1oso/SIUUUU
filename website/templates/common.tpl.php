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
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/navbar.css">
        <link rel="stylesheet" type="text/css" href="../css/signUpIn.css">
        <link rel="stylesheet" type="text/css" href="../css/profile.css">
        <script src="../scripts/RegistrationModal.js" defer></script>
        <script src="../scripts/AjaxSearch.js" defer></script>
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
                    else drawLoginIcon();
                    ?>
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
    <a href="../pages/login.php">
        <i class="fas fa-sign-in"></i>
        Login
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
                <button id="openRegisterModal">Create new account</button>
            </div>
            <div class="modalContainer" id="modalContainer">
                <div class="signUpContainer">
                    <div class="header">
                        <h1>Sign Up</h1>
                        <h2>It’s quick and easy.</h2>
                    </div>
                    <form action="../actions/action_register.php" method="POST">
                        <div class="userDetails">
                            <div class="form-input-group">
                                <input type="text" name="firstName" placeholder="First name" required>
                                <input type="text" name="lastName" placeholder="Last name" required>
                            </div>
                            <div class="form-input-group">
                                <input type="email" name="email" placeholder="Email" required>
                                <input type="tel" name="phoneNumber" placeholder="Phone number" pattern="[0-9]{9}" required>
                            </div>
                            <div class="form-input-group">
                                <input type="password" name="password1" placeholder="Password" required>
                                <input type="password" name="password2" placeholder="Confirm password" required>
                            </div>
                            <div class="form-input-group">
                                <label for="birthday">Birthday: <input type="date" id="birthday" name="birthDate"></label>
                            </div>
                            <div class="form-input-group">
                                <div>Gender:</div>
                                <div class="genders">
                                    <div>
                                        <label for="genderMale">Male</label>
                                        <input type="radio" id="genderMale" name="gender" value="Male">
                                    </div>
                                    <div>
                                        <label for="genderFemale">Female</label>
                                        <input type="radio" id="genderFemale" name="gender" value="Female">
                                    </div>
                                    <div>
                                        <label for="genderIdk">Idk</label>
                                        <input type="radio" id="genderIdk" name="gender" value="Idk">
                                    </div>
                                </div>
                            </div>
                            <div class="registerButton">
                                <input id="closeRegisterModal1" type="submit" name="submitButton" value="Register">
                            </div>
                    </form>
                        <a id="closeRegisterModal2" class="linkToLogIn">Already have an account? Log in here.</a>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php function drawLogoutForm(Session $session) { ?>
    <a href="../pages/profile.php">
        <i class="fas fa-user"></i>
        <?=$session->getName()?>
    </a>
    <form action="../actions/action_logout.php" method="post" class="logoutContainer">
        <button type="submit">
            <i class="fas fa-sign-out"></i>
            Logout
        </button>
    </form>
<?php } ?>

