<?php


namespace App\Model;


class SearchManager extends AbstractManager
{
    public const TABLE = 'wanted';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectByWordKey($name): array
    {
        $statement = $this->pdo->prepare("SELECT wanted.id, wanted.name, wanted.reward, wanted.picture
        FROM " . self::TABLE . "
        WHERE wanted.name LIKE :name");
        $statement->bindValue(':name', '%' . $name . '%', \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }
}