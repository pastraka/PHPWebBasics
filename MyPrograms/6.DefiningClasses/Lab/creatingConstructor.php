<?php

class Person
{
    public $name;
    public $age;

    function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;

        echo $this->name . " " . $this->age; //"{$this->$name} {$this->$age}";
    }
}

$name = readline();
$age = intval(readline());
$person = new Person($name, $age);