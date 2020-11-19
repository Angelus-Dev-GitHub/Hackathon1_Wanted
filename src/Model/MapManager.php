<?php


namespace App\Model;


class MapManager extends AbstractManager
{
    private const TABLE = 'city';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function read($id)
    {
        $statement = $this->pdo->prepare("SELECT city.name,city.latitude, city.longitude, wanted_city.city_id
        , wanted_city.wanted_id , wanted_city.created_at
        FROM " . self::TABLE . "
        JOIN wanted_city
        ON city.id = wanted_city.city_id
        WHERE wanted_city.wanted_id = :id");
        $statement->bindValue(':id', $id, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }
}