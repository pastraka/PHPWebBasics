<?php

require_once "Carss.php";

class Ferrari implements Carss
{
    private $driverName;

    /**
     * Ferrari constructor.
     * @param $driverName
     */
    public function __construct($driverName)
    {
        $this->driverName = $driverName;
    }

    /**
     * @return mixed
     */
    public function getDriverName()
    {
        return $this->driverName;
    }

    public function getModel()
    {
        return "488-Spider";
    }

    public function useBrakes()
    {
        return "Brakes!";
    }

    public function pushGasPedal()
    {
        return "Zadu6avam sA!";
    }

    public function __toString()
    {
        return $this->getModel() . "/" . $this->useBrakes() . "/" . $this->pushGasPedal() . "/" .
            $this->getDriverName();
    }
}

$name = readline();

$car = new Ferrari($name);

echo $car;

