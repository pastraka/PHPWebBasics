<?php

namespace Google;
class People
{
    private $name;
    private $company = null;
    private $car = null;
    private $pokemon = [];
    private $parents = [];
    private $children = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setPeople(Company $company)
    {
        $this->company = $company;
    }

    public function setCar(Car $car)
    {
        $this->car = $car;
    }

    public function setCompany(Company $company)
    {
        $this->company = $company;
    }

    public function setChildren(Relative $children)
    {
        $this->children[] = $children;
    }

    public function setParents(Relative $parents)
    {
        $this->parents[] = $parents;
    }

    public function setPokemon(Pokemon $pokemon)
    {
        $this->pokemon[] = $pokemon;
    }

    public function __toString()
    {
        return $this->name
            . PHP_EOL . 'Company:' . ($this->company ? PHP_EOL . $this->company : '')
            . PHP_EOL . 'Car:' . ($this->car ? PHP_EOL . $this->car : '')
            . PHP_EOL . 'Pokemon:' . PHP_EOL . implode(PHP_EOL, $this->pokemon)
            . PHP_EOL . 'Parents:' . (count($this->parents) ? PHP_EOL . implode(PHP_EOL, $this->parents) : '')
            . PHP_EOL . 'Children:' . (count($this->children) ? PHP_EOL . implode(PHP_EOL, $this->children) : '');
    }
}

class Company
{
    private $companyName;
    private $department;
    private $salary;

    public function __construct(string $companyName, string $department, float $salary)
    {
        $this->companyName = $companyName;
        $this->department = $department;
        $this->salary = $salary;
    }

    public function __toString()
    {
        return $this->companyName . ' ' . $this->department . ' ' . number_format($this->salary, 2, '.', '');
    }

}

class Car
{
    private $carModel;
    private $carSpeed;

    public function __construct(string $carModel, float $carSpeed)
    {
        $this->carModel = $carModel;
        $this->carSpeed = $carSpeed;
    }

    public function __toString()
    {
        return $this->carModel . ' ' . $this->carSpeed;
    }
}

class Relative
{
    private $parentName;
    private $parentBDay;

    public function __construct(string $parentName, string $parentBDay)
    {
        $this->parentName = $parentName;
        $this->parentBDay = $parentBDay;
    }

    public function __toString()
    {
        return $this->parentName . ' ' . $this->parentBDay;
    }
}

class Pokemon
{
    private $pokemonName;
    private $pokemonType;

    public function __construct(string $pokemonName, string $pokemonType)
    {
        $this->pokemonName = $pokemonName;
        $this->pokemonType = $pokemonType;
    }

    public function __toString()
    {
        return $this->pokemonName . ' ' . $this->pokemonType;
    }
}


$people = [];

while (true) {

    $n = trim(fgets(STDIN));

    if ($n == "End") {
        break;
    }

    $tokens = explode(" ", $n);
    $name = $tokens[0];
    $person = new People($name);

    switch ($tokens[1]) {
        case "company":
            $companyName = $tokens[2];
            $department = $tokens[3];
            $salary = floatval($tokens[4]);

            $company = new Company($companyName, $department, $salary);

            if (!array_key_exists($name, $people)) {
                $person->setCompany($company);
                $people[$name] = $person;
            } else {
                $people[$name]->setCompany($company);
            }
            break;
        case "pokemon":
            $pokemonName = $tokens[2];
            $pokemonType = $tokens[3];

            $pokemon = new Pokemon($pokemonName, $pokemonType);

            if (!array_key_exists($name, $people)) {
                $person->setPokemon($pokemon);
                $people[$name] = $person;
            } else {
                $people[$name]->setPokemon($pokemon);
            }
            break;
        case "parents":
            $parentsName = $tokens[2];
            $parentBDay = $tokens[3];

            $parent = new Relative($parentsName, $parentBDay);

            if (!array_key_exists($name, $people)) {
                $person->setParents($parent);
                $people[$name] = $person;
            } else {
                $people[$name]->setParents($parent);
            }
            break;
        case "children":
            $childName = $tokens[2];
            $childBDay = $tokens[3];

            $child = new Relative($childName, $childBDay);

            if (!array_key_exists($name, $people)) {
                $person->setChildren($child);
                $people[$name] = $person;
            } else {
                $people[$name]->setChildren($child);
            }
            break;
        case "car":
            $carModel = $tokens[2];
            $carSpeed = $tokens[3];

            $car = new Car($carModel, $carSpeed);

            if (!array_key_exists($name, $people)) {
                $person->setCar($car);
                $people[$name] = $person;
            } else {
                $people[$name]->setCar($car);
            }
            break;
    }

}

$n = trim(fgets(STDIN));

echo $people[$n];