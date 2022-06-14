<?php
declare(strict_types = 1);

class Dish {
    public int $id;
    public string $name;
    public int $price;
    public string $description;

    public function __construct(int $id, string $name, int $price, string $description) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    static function getRestaurantDishes(PDO $con, string $idType, int $id) : array {
        $stmt = $con->prepare('SELECT id, name, price, description FROM Dish WHERE ? = ?');
        $stmt->execute(array($idType, $id));

        $dishes = array();

        while ($dish = $stmt->fetch()) {
            $dishes[] = new Dish(
                $dish['id'],
                $dish['name'],
                $dish['price'],
                $dish['description']
            );
        }

        return $dishes;
    }
}
?>