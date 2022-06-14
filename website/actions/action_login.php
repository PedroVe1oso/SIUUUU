<?php
declare(strict_types = 1);

require_once(__DIR__ . '/../includes/classes/Session.php');
$session = new Session();

require_once(__DIR__ . '/../database/config.php');
require_once(__DIR__ . '/../database/classes/User.php');

$con = getDatabaseConnection();

$User = User::getUserWithPassword($con, $_POST['email'], $_POST['password']);

if ($User) {
    $session->setId($User->id);
    $session->setName($User->name());
    $session->addMessage('success', 'Login successful!');
    header('Location: /website/pages/index.php');
} else {
    $session->addMessage('error', 'Wrong password!');
    header('Location: /website/pages/login.php');
}
?>