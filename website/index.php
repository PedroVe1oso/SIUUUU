<?php
declare(strict_types = 1);

require_once(__DIR__ . '/includes/classes/Session.php');
$session = new Session();

require_once(__DIR__ . '/database/config.php');
require_once(__DIR__ . '/database/classes/Category.php');
require_once(__DIR__ . '/database/classes/Restaurant.php');


require_once(__DIR__ . '/templates/common.tpl.php');
require_once(__DIR__ . '/templates/category.tpl.php');
require_once(__DIR__ . '/templates/restaurant.tpl.php');

$con = getDatabaseConnection();

$categories = Category::getCategories($con, 10);
$restaurants = Restaurant::getRestaurants($con, 10);

drawHeader($session);
drawCategories($categories);
drawRestaurants($categories);
drawFooter();
?>