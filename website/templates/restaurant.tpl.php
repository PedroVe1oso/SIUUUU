<?php
declare(strict_types = 1);

require_once(__DIR__ . '/../database/classes/Restaurant.php');
require_once(__DIR__ . '/../database/classes/Category.php');
require_once(__DIR__ . '/../includes/classes/Session.php');
?>

<?php function drawRestaurants(array $restaurants) { ?>
    <header>
        <h2>Restaurants</h2>
        <!--        <input id="searchartist" type="text" placeholder="search">-->
    </header>
    <section id="restaurants">
        <?php foreach($restaurants as $restaurant) { ?>
            <article>
                <img src="<?=$restaurant->thumbnail?>">
                <a href="#"><?=$restaurant->name?></a>
            </article>
        <?php } ?>
    </section>
<?php } ?>
