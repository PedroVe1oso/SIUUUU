<!doctype html>
<html lang="en">
    <head>
        <title>Eat Up - Log In</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/signUpIn.css">
    </head>
    <body>
        <section class="signUpAndInContainer">
            <div class="signInContainer">
                <div class="header">
                    <h1>Sign In</h1>
                    <h2>Welcome.</h2>
                </div>
                <form action="actions/action_login.php" method="POST">
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
    </body>
</html>