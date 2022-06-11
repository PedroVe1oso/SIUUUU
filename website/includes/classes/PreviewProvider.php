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

        echo $id;
        echo $name;
        echo $price;
    }

    private function getRandomDish(): Entity
    {
        $stmt = $this->con->prepare("SELECT * FROM Dish ORDER BY RANDOM() LIMIT 1");
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Entity($this->con, $row);
    }
}