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

}