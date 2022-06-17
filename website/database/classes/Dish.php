<?php
declare(strict_types = 1);

class Dish {
    public int $id;
    public string $name;
    public float $price;
    public string $description;

    public function __construct(int $id, string $name, float $price, string $description) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    static function getRestaurantDishes(PDO $con, int $id) : array {
        $stmt = $con->prepare('SELECT id, name, price, description FROM Dish WHERE id = ?');
        $stmt->execute(array($id));

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