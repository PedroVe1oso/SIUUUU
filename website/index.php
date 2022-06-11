<?php
require_once("database/config.php");
require_once("includes/classes/PreviewProvider.php");

if(!isset($_SESSION['userLoggedIn']))
{
    header('Location: login.php');
}

$userLoggedIn = $_SESSION["userLoggedIn"];

$preview = new PreviewProvider($con, $userLoggedIn);

echo $preview->createPreview(null);
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Eat Up</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        SIUUUUUUUU
        SIUUUUUUUU
    </body>
</html>