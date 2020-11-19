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

}