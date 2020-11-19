<?php


namespace App\Model;


class WantedManager extends AbstractManager
{
    const TABLE = 'wanted';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function getWanted ()
    {
        $query = "SELECT * FROM wanted";
        return $this->pdo->query($query)->fetchAll();
    }

    public function getCities()
    {
        $query = "SELECT * FROM city";
        return $this->pdo->query($query)->fetchAll();
    }

    public function selectAllDataOneWantedById($id)
    {
        $query = "SELECT w.id, w.name, w.descriptif, w.picture, w.reward, c.name cities_name  
                    FROM wanted_city wc
                    JOIN city c ON wc.city_id=c.id
                    JOIN wanted w ON wc.wanted_id=w.id
                    WHERE w.id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}