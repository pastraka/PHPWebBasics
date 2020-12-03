<?php

namespace Human;

require_once "Person.php";
class Citizen implements Person, Identifiable, Birthable
{
    private $name;
    private $age;
    private $id;
    private $birthdate;

    /**
     * Citizen constructor.
     * @param string $name
     * @param int $age
     * @param string $id
     * @param string $birthdate
     */
    public function __construct(string $name, int $age, string $id, string $birthdate)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthdate($birthdate);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    public function __toString()
    {
        return "{$this->name}" . PHP_EOL . "{$this->age}" . PHP_EOL . "{$this->id}" . PHP_EOL . "{$this->birthdate}";
    }
}

$name = readline();
$age = intval(readline());
$id = readline();
$birthdate = readline();
$citizen = new Citizen($name, $age, $id, $birthdate);

echo $citizen;