<?php
declare(strict_types = 1);

require_once(__DIR__ . '/../includes/classes/Session.php');
$session = new Session();

if (!$session->isLoggedIn()) die(header('Location: /'));

require_once(__DIR__ . '/../database/config.php');
require_once(__DIR__ . '/../database/classes/User.php');

require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/user.tpl.php');

$db = getDatabaseConnection();

$user = User::getUser($db, $session->getId());

drawHeader($session);
drawProfileForm($user);
drawFooter();
?>