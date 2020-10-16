<?php

class Personn
{
    public $name;
    public $age;
}

$person = new Personn();
echo(count(get_class_vars($person)));