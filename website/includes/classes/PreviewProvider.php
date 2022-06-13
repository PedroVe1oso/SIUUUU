<?php

class PreviewProvider
{
    private $con;
    private $username;

    public function __construct($con, $username) {
        $this->con = $con;
        $this->username = $username;
    }

    public function createPreview($entity) {

        if ($entity == null) {
            $entity = $this->getRandomDish();
        }

        $id = $entity->getId();
        $name = $entity->getName();
        $price = $entity->getPrice();
        $thumbnail = $entity->getThumbnail();

        return "<div class='previewContainer'>
                        <img src='$thumbnail' class='previewImage'>
                </div>";
    }

    public function createEntityPreviewSquare($entity) {
        $id = $entity->getId();
        $thumbnail = $entity->getThumbnail();
        $name = $entity->getName();

        return "<a href='entity.php?id=$id'>
                    <div class='previewContainer small'>
                        <img src='$thumbnail' title='$name'>
                    </div>
                </a>";
    }

    private function getRandomDish(): Entity
    {
        $entity = EntityProvider::getEntities($this->con, null, 1);
        return $entity[0];
    }
}
?>