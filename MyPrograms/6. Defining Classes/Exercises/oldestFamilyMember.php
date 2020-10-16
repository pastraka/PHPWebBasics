<?php

class Persona
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $age;

    /**
     * Person constructor.
     * @param string $name
     * @param int $age
     */
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }
}

class Family
{
    private $members;

    /**
     * @var Persons
     */
    private $oldestMember;

    public function __construct()
    {
        $this->members = [];
        $this->oldestMember = null;
    }

    public function addMember(Persona $person): void
    {
        if (null == $this->oldestMember || $this->oldestMember->getAge() < $person->getAge()) {
            $this->oldestMember = $person;
        }
        $this->members[] = $person;
    }

    public function getOldestMember(): Persons
    {
        return $this->oldestMember;
    }
}

$n = intval(readline());
$family = new Family();

while ($n--) {
    list($name, $age) = explode(" ", readline());
    $person = new Persona($name, $age);
    $family->addMember($person);
}

echo $family->getOldestMember()->getName() . ' ' . $family->getOldestMember()->getAge();