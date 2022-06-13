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

    private function getRandomDish(): Entity
    {
        $entity = EntityProvider::getEntities($this->con, null, 1);
        return $entity[0];
    }
}
?>