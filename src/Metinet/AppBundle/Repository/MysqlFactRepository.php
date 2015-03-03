<?php
/**
 * Created by PhpStorm.
 * User: user01
 * Date: 03/03/15
 * Time: 08:53
 */

namespace Metinet\AppBundle\Repository;


class MysqlFactRepository implements FactRepository {

    private $connection;

    public function __construct($host, $user, $password, $database) {

        $this->connection = new \PDO( sprintf("mysql:host=%s;dbname=%s", $host, $database), $user, $password );

    }

    public function findAll() {

        $row = $this->connection->query("SELECT * FROM facts");

        return $row;
    }
}