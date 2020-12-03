<?php

spl_autoload_register();

class Mainn
{
    const INPUT_END_COMMAND = "End";

    public function run()
    {
        $this->readData();
    }

    private function readData()
    {
        $input = readline();

        while ($input !== self::INPUT_END_COMMAND) {

            $animalData = explode(" ", $input);
            $animal = AnimalFactory::create($animalData);

            $foodData = explode(" ", readline());
            $foodType = $foodData[0];
            $foodQuantity = intval($foodData[1]);
            $food = FoodFactory::create($foodType, $foodQuantity);

            $animal->makeSound();
            try {
                $animal->eat($food);
            }catch (Exception $exception) {
                echo $exception->getMessage();
            }

            echo $animal;

            $input = readline();
        }
    }
}

$main = new Mainn();
$main->run();