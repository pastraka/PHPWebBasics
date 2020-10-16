<?php


class Question
{
    private $db;

    //Question is NOT a Database
    //Question it has a Database
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        return $this->db->fetch("SELECT * FROM php_web_test.questions");
    }
}