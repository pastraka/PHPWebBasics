<?php

class Personss
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return "{$this->name} says \"Hello\"!";
    }
}

$name = readline();

$person = new Personss($name);
echo $person;
