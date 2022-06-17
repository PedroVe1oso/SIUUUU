<?php
declare(strict_types=1);

class Restaurant
{
    public int $id;
    public string $name;
    public string $thumbnail;
    public string $address;

    public function __construct(int $id, string $name, string $thumbnail, string $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->thumbnail = $thumbnail;
    }

    static function getRestaurants(PDO $con, int $count): array
    {
        $stmt = $con->prepare('SELECT id, name, thumbnail, address FROM Restaurant ORDER BY RANDOM() LIMIT ?');
        $stmt->execute(array($count));

        $restaurants = array();
        while ($restaurant = $stmt->fetch()) {
            $restaurants[] = new Restaurant(
                $restaurant['id'],
                $restaurant['name'],
                $restaurant['thumbnail'],
                $restaurant['address']
            );
        }

        return $restaurants;
    }

    static function searchRestaurant(PDO $con, string $search, int $count) : array {
        $stmt = $con->prepare('SELECT id, name, thumbnail, address FROM Restaurant WHERE Name LIKE ? LIMIT ?');
        $stmt->execute(array($search . '%', $count));

        $restaurants = array();
        while ($restaurant = $stmt->fetch()) {
            $restaurants[] = new Restaurant(
                $restaurant['id'],
                $restaurant['name'],
                $restaurant['thumbnail'],
                $restaurant['address']
            );
        }

        return $restaurants;
    }

    static function getRestaurant(PDO $con, int $id): Restaurant
    {
        $stmt = $con->prepare('SELECT id, name, thumbnail, address FROM Restaurant WHERE id = ?');
        $stmt->execute(array($id));

        $restaurant = $stmt->fetch();

        return new Restaurant(
            $restaurant['id'],
            $restaurant['name'],
            $restaurant['thumbnail'],
            $restaurant['address']
        );
    }

    function save($db)
    {
        $stmt = $db->prepare('UPDATE Restaurant SET name = ? WHERE id = ?');

        $stmt->execute(array($this->name, $this->id));
    }
}
