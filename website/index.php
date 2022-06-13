<?php
require_once(__DIR__ . '/includes/header.php');


//$preview = new PreviewProvider($con, $userLoggedIn);
//
//echo $preview->createPreview(null);

$categoryContainers = new CategoryContainers($con, $userLoggedIn);

echo $categoryContainers->showAllCategories(null);
?>