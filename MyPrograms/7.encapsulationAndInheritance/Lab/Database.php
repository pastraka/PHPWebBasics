<?php


class Database
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=soft_uni;host=localhost", "root", );
    }

    public function fetch($query)
    {

    }
}