<?php

class Car
{
    private $model;
    private $engine;
    private $weight;
    private $color;

    /**
     * Car constructor.
     * @param $model
     * @param $engine
     * @param $weight
     * @param $color
     */
    public function __construct($model, Engine $engine, $weight, $color)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return array
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    public function __toString()
    {
        return "{$this->model}:
  {$this->engine->model}:
    Power: {$this->engine->power}
    Displacement: {$this->engine->displacement}
    Efficiency: {$this->engine->efficiency}
  Weight: {$this->weight}
  Color: {$this->color}".PHP_EOL;
    }
}

class Engine
{
    public $model;
    public $power;
    public $displacement;
    public $efficiency;

    /**
     * Engine constructor.
     * @param $model
     * @param $power
     * @param $displacement
     * @param $efficiency
     */
    public function __construct($model, $power, $displacement, $efficiency)
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @return mixed
     */
    public function getDisplacement()
    {
        return $this->displacement;
    }

    /**
     * @return mixed
     */
    public function getEfficiency()
    {
        return $this->efficiency;
    }

    public function getArray(): array
    {
        return [
            $this->getModel(),
            $this->getPower(),
            $this->getDisplacement(),
            $this->getEfficiency()
        ];
    }
}

$n = readline();
$engines = [];

for ($i = 0; $i < $n; $i++) {
    $tokens = explode(" ", readline());
    $model = $tokens[0];
    $power = $tokens[1];
    $displacement = 'n/a';
    $efficiency = 'n/a';

    if (count($tokens) == 4) {
        $displacement = $tokens[2];
        $efficiency = $tokens[3];
    } elseif (count($tokens) == 3) {
        if (is_numeric($tokens[2])) {
            $displacement = $tokens[2];
        } else {
            $efficiency = $tokens[2];
        }
    }
    $engine = new Engine($model, $power, $displacement, $efficiency);
    $engines[] = $engine;
}

$m = readline();
$cars = [];

for ($i = 0; $i < $m; $i++) {
    $tokens = explode(" ", readline());
    $model = $tokens[0];
    $engineName = $tokens[1];
    $weight = "n/a";
    $color = "n/a";

    if (count($tokens) == 4) {
        $weight = $tokens[2];
        $color = $tokens[3];
    } elseif (count($tokens) == 3) {
        if (is_numeric($tokens[2])) {
            $weight = $tokens[2];
        } else {
            $color = $tokens[2];
        }
    }
    foreach ($engines as $eng) {
        if ($engineName == $eng->getModel()) {
            $currEng = $eng;
            break;
        }
    }
    $cars[] = new Car($model, $currEng, $weight, $color);
}

foreach ($cars as $car) {
    echo $car;
}