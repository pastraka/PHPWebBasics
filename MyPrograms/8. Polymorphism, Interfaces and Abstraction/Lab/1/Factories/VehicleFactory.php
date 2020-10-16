<?php


namespace Factories;

use Exception;
use Vehicles\VehicleInterface;

class VehicleFactory implements VehicleFactoryInterface
{

    /**
     * @param string $type
     * @param float $quantity
     * @param float $consumption
     * @return VehicleInterface
     * @throws Exception
     */
    public function create(string $type, float $quantity, float $consumption): VehicleInterface
    {
        $className = "Vehicles\\" . $type;

        if (!class_exists($className)) {
            throw new Exception("Invalid Vehicle type!");
        }

        return new $className($quantity, $consumption);
    }
}