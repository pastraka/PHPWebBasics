<?php


class Question extends Database
{
    public function getAll()
    {
        return $this->fetch("SELECT * FROM questions");
    }
}