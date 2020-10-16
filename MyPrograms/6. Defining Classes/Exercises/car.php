<?php

class Cars
{
    private $speed;
    private $fuel;
    private $fuelEconomy;
    private $traveledDistance = 0.0;
    private $travelTime = 0.0;
    private $minutesPerKm = 0.0;
    private $fuelPerKm = 0.0;

    public function __construct(float $speed, float $fuel, float $fuelEconomy)
    {
        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->fuelEconomy = $fuelEconomy;
        $this->minutesPerKm = 60 / $this->speed;
        $this->fuelPerKm = $this->fuelEconomy / 100;
    }

    public function travel(float $distance)
    {
        $requiredFuel = $this->fuelPerKm * $distance;
        if ($requiredFuel <= $this->fuel) {
            $this->fuel -= $requiredFuel;
            $this->traveledDistance += $distance;
            $this->travelTime += $distance * $this->minutesPerKm;
        } else {
            $possibleDistance = $this->fuel / $this->fuelPerKm;
            $this->traveledDistance += $possibleDistance;
            $this->fuel = 0;
            $this->travelTime += $possibleDistance * $this->minutesPerKm;
        }
    }

    public function reFuel(float $fuel)
    {
        $this->fuel += $fuel;
    }

    public function printDistance()
    {
        $formatted = number_format(round($this->traveledDistance, 1), 1);
        echo "Total Distance: {$formatted}" . PHP_EOL;
    }

    public function printTime()
    {
        $hours = floor($this->travelTime / 60);
        $minutes = floor($this->travelTime % 60);
        echo "Total Time: {$hours} hours and {$minutes} minutes" . PHP_EOL;
    }

    public function printFuel()
    {
        $formatted = number_format(round($this->fuel, 1), 1);
        echo "Fuel left: {$formatted} liters" . PHP_EOL;
    }
}

$input = explode(" ", readline());

$speed = floatval($input[0]);
$fuel = floatval($input[1]);
$fuelEconomy = floatval($input[2]);

$car = new Cars($speed, $fuel, $fuelEconomy);

while (true) {

    $commands = explode(" ", readline());

    if ($commands[0] == "END") {
        break;
    }

    switch ($commands[0]) {
        case "Travel":
            $car->travel(floatval($commands[1]));
            break;
        case "Refuel":
            $car->reFuel(floatval($commands[1]));
            break;
        case "Distance":
            $car->printDistance();
            break;
        case "Time":
            $car->printTime();
            break;
        case "Fuel":
            $car->printFuel();
            break;
    }
}