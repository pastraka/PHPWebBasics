<?php
namespace Vehicles;

abstract class VehicleAbstract implements VehicleInterface
{
    private $fuelQuantity;
    private $fuelConsumption;
    private $modifier;

    /**
     * VehicleAbstract constructor.
     * @param float $fuelQuantity
     * @param float $fuelConsumption
     * @param float $modifier
     */
    public function __construct(float $fuelQuantity, float $fuelConsumption, float $modifier)
    {
        $this->fuelQuantity = $fuelQuantity;
        $this->modifier = $modifier;
        $this->fuelConsumption = $fuelConsumption + $this->modifier;
    }

    public function drive(float $distance): string
    {
        if ($this->fuelQuantity >= $this->fuelConsumption * $distance) {
            $this->fuelQuantity -= $this->fuelConsumption * $distance;
            return basename(get_class($this)) . " travelled " . $distance . " km" . PHP_EOL;
        }
        return basename(get_class($this)) . " needs refueling" . PHP_EOL;
    }

    public function refuel(float $litres): void
    {
        $this->fuelQuantity += $litres;
    }

    public function __toString()
    {
        return basename(get_class($this)) . ": " . number_format($this->fuelQuantity, 2);
    }
}