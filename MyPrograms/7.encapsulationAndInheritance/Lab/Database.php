<?php


class Database
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=soft_uni;host=localhost", "root",);
    }

    public function fetch($query)
    {
        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}