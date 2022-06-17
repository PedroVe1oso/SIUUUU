<?php
declare(strict_types = 1);

require_once(__DIR__ . '/../database/classes/Restaurant.php');
?>

<?php function drawRestaurants(array $restaurants) { ?>
    <section class="previewContainer">
        <a href="#">
            <h2>Restaurants</h2>
        </a>
        <input id="searchrestaurant" type="text" placeholder="Search restaurant">
        <section id="restaurants" class="list">
            <?php foreach($restaurants as $restaurant) { ?>
            <a href="#">
                <article class="entity">
                    <img src="../assets/images/thumbnails/restaurants/<?=$restaurant->thumbnail?>">
                    <p><?=$restaurant->name?></p>
                </article>
            </a>
            <?php } ?>
        </section>
    </section>
<?php } ?>
