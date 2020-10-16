<?php


class Database
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=php_web_test;host=localhost", "root", "");
    }

    public function fetch($query)
    {
        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}