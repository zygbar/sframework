<?php

namespace App\Users;

use Doctrine\DBAL\Query\QueryBuilder;

class UserRepository
{
    /**
     * @var QueryBuilder
     */
    private $queryBuilder;

    public function __construct(QueryBuilder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    /**
     * Fetch all users
     *
     * @return array
     */
    public function getAll() : array
    {
        $query = $this->queryBuilder
            ->select('id', 'name')
            ->from('users');

        return $query->execute()->fetchAll();
    }

    /**
     * Add user
     *
     * @param $name
     */
    public function add($name)
    {
        $query = $this->queryBuilder
            ->insert('users')
            ->setValue('name', '?')
            ->setParameter(0, $name);

        $query->execute();
    }
}