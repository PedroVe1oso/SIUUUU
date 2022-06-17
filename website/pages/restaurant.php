<?php
declare(strict_types = 1);

require_once(__DIR__ . '/../includes/classes/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/config.php');

require_once(__DIR__ . '/../database/classes/Restaurant.php');
require_once(__DIR__ . '/../database/classes/Dish.php');

require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/restaurant.tpl.php');

$con = getDatabaseConnection();

$restaurant = Restaurant::getRestaurant($con, intval($_GET['id']));
$dishes = Dish::getRestaurantDishes($con, intval($_GET['id']));

drawHeader($session);
drawRestaurant($restaurant, $dishes);
drawFooter();
?>