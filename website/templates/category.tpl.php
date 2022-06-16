<?php

declare(strict_types = 1);

require_once(__DIR__ . '/../database/classes/Category.php');
?>

<?php function drawCategories(array $categories) { ?>
    <section class="previewContainer">
        <a href="#">
            <h2>Categories</h2>
        </a>
            <!--        <input id="searchartist" type="text" placeholder="search">-->
        <section class="list">
            <?php foreach($categories as $category) { ?>
                 <a href="#">
                     <article class="entity">
                         <img src="../assets/images/categories/thumbnails/<?=$category->thumbnail?>">
                         <p><?=$category->name?></p>
                     </article>
                 </a>
            <?php } ?>
        </section>
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
