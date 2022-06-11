<?php

class Entity
{
    private $con;
    private $sqlData;

    public function __construct($con, $input) {
        $this->con = $con;

        if (is_array($input)){
            $this->sqlData = $input;
        }
        else{
            $stmt = $this->con->prepare("SELECT * FROM Dish WHERE id=:id");
            $stmt->bindValue(":id", $input);
            $stmt->execute();

            $this->sqlData = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function getId() {
        return $this->sqlData["id"];
    }

    public function getName() {
        return $this->sqlData["name"];
    }

    public function getPrice() {
        return $this->sqlData["price"];
    }

    public function getThumbnail() {
        return $this->sqlData["thumbnail"];
    }
}