<?php

declare(strict_types = 1);

require_once(__DIR__ . '/../database/classes/Category.php');
?>

<?php function drawCategories(array $categories) { ?>
    <header>
        <h2>Categories</h2>
<!--        <input id="searchartist" type="text" placeholder="search">-->
    </header>
    <section id="categories">
        <?php foreach($categories as $category) { ?>
            <article>
                <img src="<?=$category->thumbnail?>">
                <a href="#"><?=$category->name?></a>
            </article>
        <?php } ?>
    </section>
<?php } ?>

<?php function drawCategory(Category $category, array $dishes) { ?>
    <h2><?=$category->name?></h2>
    <section id="dishes">
        <?php foreach ($dishes as $dish) { ?>
            <article>
<!--                <img src="--><?//=$dish->id?><!--">-->
<!--                <a href="../pages/album.php?id=--><?//=$dish->id?><!--">--><?//=$dish->title?><!--</a>-->
<!--                <p class="info">--><?//=$dish->tracks?><!-- tracks / --><?//=$dish->length?><!-- min</p>-->
            </article>
        <?php } ?>
    </section>
<?php }

?>
