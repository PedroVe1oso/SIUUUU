<?php

declare(strict_types=1);

require_once(__DIR__ . '/../includes/classes/Session.php');
$session = new Session();

if (!$session->isLoggedIn()) die(header('Location: /'));

require_once(__DIR__ . '/../database/config.php');
require_once(__DIR__ . '/../database/classes/user.php');

$con = getDatabaseConnection();

$user = User::getUser($con, $session->getId());

if ($user) {
    $user->firstName = $_POST['firstName'];
    $user->lastName = $_POST['lastLame'];


    $user->save($con);

    $session->setName($user->name());
}

header('Location: ../pages/profile.php');
