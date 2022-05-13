<!doctype html>
<html lang="en">
    <head>
        <title>Eat Up - Sign Up</title>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/signUpIn.css">
    </head>
    <body>
        <div class="signUpAndInContainer">
            <section class="signUpContainer">
                
                <div class="header">
                    <h1>Sign Up</h1>
                    <h2>It’s quick and easy.</h2>
                </div>
                <form method="POST">
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
                            <input type="password" name="password" placeholder="Password" required>
                            <input type="password" name="password2" placeholder="Confirm password" required>
                        </div>
                        <div class="form-input-group">
                            <label for="birthday">Birthday: <input type="date" id="birthday" name="birthday"></label>
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
                        <input type="submit" name="submitButton" value="Register">
                    </div>
                </form>
                <a href="login.php" class="linkToLogIn">Already have an account? Log in here.</a>
            </section>
        </div>
    </body>
</html>