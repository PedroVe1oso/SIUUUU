<?php
declare(strict_types = 1);

require_once(__DIR__ . '/../database/classes/Restaurant.php');
?>

<?php function drawRestaurants(array $restaurants) { ?>
    <section class="previewContainer">
        <div class="previewHeader">
            <a href="#">
                <h2>Restaurants</h2>
            </a>
            <div class="search">
                <input id="searchrestaurant" type="text" placeholder="Search restaurant">
            </div>
        </div>
        <section id="restaurants" class="list">
            <?php foreach($restaurants as $restaurant) { ?>
            <a href="../pages/restaurant.php?id=<?=$restaurant->id?>">
                <article class="entity">
                    <img src="../assets/images/thumbnails/restaurants/<?=$restaurant->thumbnail?>">
                    <p><?=$restaurant->name?></p>
                </article>
            </a>
            <?php } ?>
        </section>
    </section>
<?php } ?>

<?php function drawRestaurant(Restaurant $restaurant ,array $dishes) { ?>
    <section class="previewContainer">
        <a href="#">
            <h2><?=$restaurant->name?></h2>
        </a>
        <section id="dishes" class="list">
            <?php foreach($dishes as $dish) { ?>
                <a href="#">
                    <article class="entity">
                        <img src="../assets/images/thumbnails/restaurants/<?=$dish->thumbnail?>">
                        <h3><?=$dish->name?></h3>
                        <h4><?=$dish->description?></h4>
                    </article>
                </a>
            <?php } ?>
        </section>
    </section>
<?php } ?>

<?php function drawMyRestaurants(array $restaurants) { ?>
    <section class="previewContainer">
        <section id="restaurants" class="list">
            <?php foreach($restaurants as $restaurant) { ?>
                <a href="../pages/restaurant.php?id=<?=$restaurant->id?>">
                    <article class="entity">
                        <img src="../assets/images/thumbnails/restaurants/<?=$restaurant->thumbnail?>">
                        <p><?=$restaurant->name?></p>
                    </article>
                </a>
            <?php } ?>
        </section>
    </section>
<?php } ?>
