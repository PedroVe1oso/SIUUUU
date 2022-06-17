<?php
declare(strict_types = 1);

require_once(__DIR__ . '/../includes/classes/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/config.php');
require_once(__DIR__ . '/../database/classes/Restaurant.php');

$con = getDatabaseConnection();

$restaurants = Restaurant::searchRestaurant($con, $_GET['search'], 8);

echo json_encode($restaurants);
?>