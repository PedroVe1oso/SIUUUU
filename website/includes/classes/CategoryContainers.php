<?php

class CategoryContainers
{
    private $con;
    private $username;

    public function __construct($con, $username) {
        $this->con = $con;
        $this->username = $username;
    }

    public function showAllCategories(){
        $stmt = $this->con->prepare("SELECT * FROM Category");
        $stmt->execute();

        /*$html = "<header>
                    <h2></h2>
                    <input id='searchartist' type='text' placeholder='search'>
                 </header>
                 <section id='artists'>
                    <?php foreach($artists as $artist) { ?>
                        <article>
                            <img src='https://picsum.photos/200?<?=$artist->id?>'>
                            <a href='../pages/artist.php?id=<?=$artist->id?>'><?=$artist->name?></a>
                        </article>
                    <?php } ?>
                 </section>";*/

        $html = "<div class='previewCategories'>";

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $html .= $this->getCategoryHtml($row, null, true, true);
        }

        return $html . "</div>";
    }

    private function getCategoryHtml($sqlData, $name, $restaurants, $dishes) {
        $categoryId = $sqlData["id"];
        $name = $name == null ? $sqlData["name"] : $name;

        $entities = EntityProvider::getEntities($this->con, $categoryId, 20);

        if (sizeof($entities) == 0) {
            return;
        }

        $entitiesHtml = "";
        $previewProvider = new PreviewProvider($this->con, $this->username);

        foreach ($entities as $entity) {
            $entitiesHtml .= $previewProvider->createEntityPreviewSquare($entity);
        }
        return $entitiesHtml . "<br>";
    }
}
?>