<?php

class EntityProvider
{

    public static function getEntities($con, $categoryId, $limit) {

        $stmt = "SELECT * FROM Dish ";

        if ($categoryId != null) {
            $stmt .= "WHERE id=:categoryId";
        }

        $stmt .= "ORDER BY RANDOM() LIMIT :limit";

        $query = $con->prepare($stmt);
        if ($categoryId != null) {
            $query->bindValue(":categoryId", $categoryId);
        }

        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
        $query->execute();

        $result = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Entity($con, $row);
        }

        return $result;
    }
}
?>