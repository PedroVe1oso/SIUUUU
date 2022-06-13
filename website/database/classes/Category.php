<?php

declare(strict_types = 1);


class Category
{

    public int $id;
    public string $name;
    public string $thumbnail;

    public function __construct(int $id, string $name, string $thumbnail)
    {
        $this->id = $id;
        $this->name = $name;
        $this->thumbnail = $thumbnail;
    }

    static function getCategories(PDO $con, int $count): array
    {
        $stmt = $con->prepare('SELECT id, name, thumbnail FROM Category LIMIT ?');
        $stmt->execute(array($count));

        $categories = array();
        while ($category = $stmt->fetch()) {
            $categories[] = new Category(
                $category['id'],
                $category['name'],
                $category['thumbnail']
            );
        }

        return $categories;
    }

    static function getCategory(PDO $con, int $id): Category
    {
        $stmt = $con->prepare('SELECT id, name FROM Category WHERE id = ?');
        $stmt->execute(array($id));

        $category = $stmt->fetch();

        return new Category(
            $category['id'],
            $category['name'],
            $category['thumbnail']
        );
    }
}
?>