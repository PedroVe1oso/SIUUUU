<?php
declare(strict_types = 1);

require_once(__DIR__ . '/../includes/classes/Session.php');
$session = new Session();

require_once(__DIR__ . '/../database/config.php');

require_once(__DIR__ . '/../templates/common.tpl.php');


drawHeader($session);
drawLoginForm();
drawFooter();
?>