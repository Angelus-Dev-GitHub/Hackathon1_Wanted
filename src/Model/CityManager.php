<?php


namespace App\Model;


class CityManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'city';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function addCityForWanted($city, $id)
    {
        $query = "INSERT INTO wanted_city (city_id, wanted_id, created_at) 
                    VALUES (:city_id, :wanted_id, created_at)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':city_id', $city['city_id'], \PDO::PARAM_INT);
        $statement->bindValue(':wanted_id', $id, \PDO::PARAM_INT);
        $statement->bindValue(':created_at', $city['created_at'], \PDO::PARAM_STR);

        return $statement->execute();
    }
    
}