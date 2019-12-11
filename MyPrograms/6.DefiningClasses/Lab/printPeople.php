<?php

class Person
{
    private string $name;
    private int $age;
    private string $occupation;

    /**
     * Person constructor.
     * @param $name
     * @param $age
     * @param $occupation
     */
    public function __construct(string $name, int $age, string $occupation)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setOccupation($occupation);
    }

    /**
     * @return string
     */
    private function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    private function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    private function getOccupation(): string
    {
        return $this->occupation;
    }

    /**
     * @param string $occupation
     */
    private function setOccupation(string $occupation): void
    {
        $this->occupation = $occupation;
    }

    public function __toString()
    {
        return "{$this->getName()} - age: {$this->getAge()}, occupation: {$this->getOccupation()}" . PHP_EOL;
    }

}

$input = readline();
$people = [];

while ($input != "END") {

    list($name, $age, $occupation) = explode(" ", $input);
    $age = intval($age);

    $person = new Person($name, $age, $occupation);
    $people[] = $person;

    //print_r($people);

    $input = readline();
}

usort($people, function (Person $p1, Person $p2) {
    return $p1->getAge() <=> $p2->getAge();
});

/** @var Person $person */
foreach ($people as $person) {
    echo $person;
}


//class Person
//{
//    public $name;
//    public $age;
//    public $occupation;
//
//    /**
//     * Person constructor.
//     * @param $name
//     * @param $age
//     * @param $occupation
//     */
//    public function __construct(string $name, int $age, string $occupation)
//    {
//        $this->name = $name;
//        $this->age = $age;
//        $this->occupation = $occupation;
//    }
//
//    public function getAge()
//    {
//        return $this->age;
//    }
//
//    public function __toString()
//    {
//        return $this->name . " - age: " . $this->age . ", " . "occupation: " . $this->occupation . PHP_EOL;
//    }
//}
//
//$input = readline();
//$person = [];
//
//while (true) {
//    if ($input == "END") {
//        break;
//    }
//    $input = explode(" ", $input);
//    $name = $input[0];
//    $age = intval($input[1]);
//    $occupation = $input[2];
//    $person[] = new Person($name, $age, $occupation);
//
//    $input = readline();
//}
//usort($person, function ($a, $b) {
//    return $a->getAge() > $b->getAge();
//});
//
//foreach ($person as $item) {
//    echo $item;
//}