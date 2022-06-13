<?php
declare(strict_types=1);

class Restaurant
{
    public int $id;
    public string $name;
    public string $address;

    public function __construct(int $id, string $name, string $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
    }

    static function getRestaurants(PDO $con, int $count): array
    {
        $stmt = $con->prepare('SELECT id, name, address FROM Restaurant LIMIT ?');
        $stmt->execute(array($count));

        $restaurants = array();
        while ($restaurant = $stmt->fetch()) {
            $restaurants[] = new Restaurant(
                $restaurant['id'],
                $restaurant['name'],
                $restaurant['address']
            );
        }

        return $restaurants;
    }

    static function getRestaurant(PDO $con, int $id): Restaurant
    {
        $stmt = $con->prepare('SELECT id, name, address FROM Restaurant WHERE id = ?');
        $stmt->execute(array($id));

        $restaurant = $stmt->fetch();

        return new Restaurant(
            $restaurant['id'],
            $restaurant['name'],
            $restaurant['address'],
        );
    }

    function save($db)
    {
        $stmt = $db->prepare('UPDATE Restaurant SET name = ? WHERE id = ?');

        $stmt->execute(array($this->name, $this->id));
    }
}
