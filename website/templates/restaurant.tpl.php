<?php
declare(strict_types = 1);

require_once(__DIR__ . '/../database/classes/Restaurant.php');
//require_once(__DIR__ . '/../database/classes/Category.php');
//require_once(__DIR__ . '/../includes/classes/Session.php');
?>

<?php function drawRestaurants(array $restaurants) { ?>
    <section class="previewContainer">
        <a href="#">
            <h2>Restaurants</h2>
        </a>
        <section class="list">
            <?php foreach($restaurants as $restaurant) { ?>
            <a href="#">
                <article class="entity">
                    <img src="../assets/images/categories/thumbnails/<?=$restaurant->thumbnail?>">
                    <p><?=$restaurant->name?></p>
                </article>
            </a>
            <?php } ?>
        </section>
    </section>
<?php } ?>
