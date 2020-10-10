<?php

class Dough
{
    const FLOUR = ["white", "wholegrain"];
    const TECHNIQUES = ["crispy", "chewy", "homemade"];
    const MODIFIERS = ["white" => 1.5, "wholegrain" => 1, "crispy" => 0.9, "chewy" => 1.1, "homemade" => 1.0];
    private $flour;
    private $techniques;
    private $weight;

    /**
     * Dough constructor.
     * @param string $flour
     * @param string $techniques
     * @param float $weight
     * @throws Exception
     */
    public function __construct(string $flour, string $techniques, float $weight)
    {
        //method call with arguments
        $this->setFlour($flour);
        $this->setTechniques($techniques);
        $this->setWeight($weight);
    }

    /**
     * @param string $flour
     * @throws Exception
     */
    private function setFlour(string $flour)
    {
        if (!in_array(strtolower($flour), self::FLOUR)) {
            throw new Exception("Invalid type of dough.");
        }

        $this->flour = strtolower($flour);
    }

    /**
     * @param  $techniques
     * @throws Exception
     */
    private function setTechniques($techniques)
    {
        if (!in_array(strtolower($techniques), self::TECHNIQUES)) {
            throw new Exception("Invalid type of dough.");
        }

        $this->techniques = strtolower($techniques);
    }

    /**
     * @param $weight ;
     * @throws Exception
     */
    private function setWeight($weight)
    {
        if ($weight < 1 || $weight > 200) {
            throw new Exception("Dough weight should be in the range [1..200].");
        }

        $this->weight = $weight;
    }

    public function calcCalculator()
    {
        $baseCalories = 2 * $this->weight;
        return $baseCalories * self::MODIFIERS[$this->flour] * self::MODIFIERS[$this->techniques];
    }

    public function __toString()
    {
        return number_format($this->calcCalculator(), 2, ".", "");
    }
}

class Pizza
{
    private $name;
    private $dough;
    private $toppings;
    private $numberToppings;

    /**
     * Pizza constructor.
     * @param string $name
     * @param Dough $dough
     * @param int $numberToppings
     * @throws Exception
     */
    function __construct(string $name, Dough $dough, int $numberToppings)
    {
        $this->setName($name);
        $this->setDough($dough);
        $this->toppings = [];
        $this->setNumberToppings($numberToppings);
    }

    /**
     * @param $name
     * @throws Exception
     */
    private function setName($name)
    {
        if (empty($name) || strlen($name) > 15) {
            throw new Exception("Pizza name should be between 1 and 15 symbols");
        }
        $this->name = $name;
    }

    private function setDough(Dough $dough)
    {
        $this->dough = $dough;
    }

    public function addTopping(Topping $topping)
    {
        $this->toppings[] = $topping;
    }

    public function getToppings()
    {
        return count($this->toppings);
    }

    /**
     * @param int $numberToppings
     * @throws Exception
     */
    private function setNumberToppings(int $numberToppings)
    {
        if ($numberToppings <= 0 || $numberToppings > 10) {
            throw new Exception("Number of toppings should be in range [0..10].");
        }

        $this->numberToppings = $numberToppings;
    }

    /**
     * return int
     */
    public function totalCalories()
    {
        $totalCals = 0;
        $doughCals = $this->dough->calcCalculator();
        $totalCals += $doughCals;

        foreach ($this->toppings as $topping) {
            $currToppingCals = $topping->calculatorCalories();
            $totalCals += $currToppingCals;
        }
        return $totalCals;
    }

    public function __toString()
    {
        $calories = number_format($this->totalCalories(), 2, ".", "");
        return "$this->name - {$calories} Calories.";
    }

}

class Topping
{
    const ToppingTypes = ["meat", "veggies", "cheese", "sauce"];
    const Modifiers = ["meat" => 1.2, "veggies" => 0.8, "cheese" => 1.1, "sauce" => 0.9];
    private $type;
    private $weight;

    /**
     * Topping constructor.
     * @param string $type
     * @param string $weight
     * @throws Exception
     */
    public function __construct(string $type, string $weight)
    {
        $this->setType($type);
        $this->setWeight($weight);
    }

    /**
     * @param string $type
     * @throws Exception
     */
    private function setType(string $type)
    {
        if (!in_array(strtolower($type), self::ToppingTypes)) {
            throw new Exception("Cannot place $type on top of your pizza.");
        }
        $this->type = strtolower($type);
    }

    /**
     * @param $weight
     * @throws Exception
     */
    private function setWeight($weight)
    {
        if ($weight < 1 || $weight > 50) {
            throw new Exception(strtoupper($this->type[0]) . substr($this->type, 1) . " weight should be in the range [1..50].");
        }
        $this->weight = $weight;
    }

    public function calculatorCalories()
    {
        $baseCalories = 2 * $this->weight;
        return $baseCalories * self::Modifiers[$this->type];
    }

    public function __toString()
    {
        return number_format($this->calculatorCalories(), 2, ".", "");
    }
}

$input = readline();

list($_, $pizzaName, $numberToppings) = explode(" ", $input);

if ($numberToppings < 1 || $numberToppings > 10) {
    echo("Number of toppings should be in range [0..10].");
    die();
}
if (empty($pizzaName) || strlen($pizzaName) > 15) {
    echo("Pizza name should be between 1 and 15 symbols.");
    die();
}

$input = readline();
$input = explode(" ", $input);
$command = array_shift($input);

list($typeFlour, $technique, $weight) = $input;

try {
    $dough = new Dough($typeFlour, $technique, floatval($weight));
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    die();
}

try {
    $pizza = new Pizza($pizzaName, $dough, intval($numberToppings));
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    die();
}

for ($i = 0; $i < $numberToppings; $i++) {
    $input = readline();
    $input = explode(" ", $input);
    $command = array_shift($input);
    list($type, $weight) = $input;

    try {
        $topping = new Topping($type, floatval($weight));
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
        die();
    }
    $pizza->addTopping($topping);
}
echo $pizza;
