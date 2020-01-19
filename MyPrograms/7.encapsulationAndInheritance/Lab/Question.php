<?php


class Question extends Database
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        return $this->db->fetch("SELECT * FROM soft_uni.questions");
    }
}