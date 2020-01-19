<?php
declare(strict_types=1);

class Vehicle
{
    const DEFAULT_NAME = "No name";
    protected $leftLight;
    protected $rightLight;

    private $name;

    public function __construct(string $name = self::DEFAULT_NAME)
    {
        $this->name = $name;
        $this->leftLight = false;
        $this->rightLight = false;
    }

    public function toggleLights(): void
    {
        $this->leftLight = !$this->leftLight;
        $this->rightLight = !$this->rightLight;
    }

    public function lightsEnabled(): bool
    {
        return $this->rightLight && $this->leftLight;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class Carr extends Vehicle
{

}

class Bus extends Vehicle
{
    const DEFAULT_NAME_SUFFIX = " BUS BRAT";
    const DEFAULT_DOORS = 3;
    const DEFAULT_PEOPLE_PER_DOOR = 4;
    const DEFAULT_PEOPLE_CAPACITY = self::DEFAULT_PEOPLE_PER_DOOR * self::DEFAULT_DOORS;

    public function getPeople(): int
    {
        return self::DEFAULT_PEOPLE_CAPACITY;
    }

    public function getName(): string
    {
        return parent::getName() . self::DEFAULT_NAME_SUFFIX . PHP_EOL;
    }
}


class Truck extends Vehicle
{
    private $upperLight;
    private $lowerLight;

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->upperLight = false;
        $this->lowerLight = false;
    }

    public function toggleLights(): void
    {
        parent::toggleLights();
        $this->upperLight = !$this->upperLight;
        $this->lowerLight = !$this->lowerLight;
    }

    public function lightsEnabled(): bool
    {
        return parent::lightsEnabled() && $this->upperLight && $this->lowerLight;
    }

    public function getFuelConsumption()
    {
        return 300;
    }
}

class Tank extends Vehicle
{
    public function getName(): string
    {
        return "I went out with the Tank called: " . parent::getName();
    }
}

class BattleTank extends Vehicle
{
    public function getName(): string
    {
        return parent::getName() . ", with the Battle one!";
    }
}

$v1 = new Carr("Car1");
$v2 = new Carr("Car2");
$v3 = new Carr("Car3");

$v4 = new Bus("Bus1");
$v5 = new Bus("Bus2");

$v6 = new Truck("Truck1");
$v7 = new Truck("Truck2");

/** @var Vehicle[] $vehicle */
$vehicles = [$v1, $v2, $v3, $v4, new BattleTank("Hero"), $v5, $v6, $v7];


foreach ($vehicles as $vehicle) {
    for ($i = 0; $i < rand(3, 10); $i++) {
        $vehicle->toggleLights();
    }
    if ($vehicle->lightsEnabled()) {
        echo "Lights on!" . PHP_EOL;
    }

    echo $vehicle->getName() . PHP_EOL;
    echo "---------------------" . PHP_EOL;
}

require_once "Database.php";
require_once "Question.php";

var_dump((new Question(new Database()))->getAll());