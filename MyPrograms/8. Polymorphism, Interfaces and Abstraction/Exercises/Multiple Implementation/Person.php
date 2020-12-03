<?php

namespace Human;

interface Person
{
    //All methods must be here
    public function setName(string $name): void;

    public function setAge(int $age): void;
}

interface Identifiable
{
    public function setId($id);
}

interface Birthable
{
    public function setBirthdate($birthdate);
}