<?php

class Person
{
    public $name;
    public $age;
    public $occupation;

    /**
     * Person constructor.
     * @param $name
     * @param $age
     * @param $occupation
     */
    public function __construct(string $name, int $age, string $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function __toString()
    {
        return $this->name . " - age: " . $this->age . ", " . "occupation: " . $this->occupation . PHP_EOL;
    }
}

$input = readline();
$person = [];

while (true) {
    if ($input == "END") {
        break;
    }
    $input = explode(" ", $input);
    $name = $input[0];
    $age = intval($input[1]);
    $occupation = $input[2];
    $person[] = new Person($name, $age, $occupation);

    $input = readline();
}
usort($person, function ($a, $b) {
    return $a->getAge() > $b->getAge();
});

foreach ($person as $item) {
    echo $item;
}