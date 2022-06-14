<?php
declare(strict_types = 1);

require_once(__DIR__ . '/../database/classes/Restaurant.php');
//require_once(__DIR__ . '/../database/classes/Category.php');
//require_once(__DIR__ . '/../includes/classes/Session.php');
?>

<?php function drawRestaurants(array $restaurants) { ?>
    <div id="entityHeader">
        <h2>Restaurants</h2>
    </div>
    <section id="entity">
        <?php foreach($restaurants as $restaurant) { ?>
            <article>
                <a href="#"><?=$restaurant->name?></a>
            </article>
        <?php } ?>
    </section>
<?php } ?>
