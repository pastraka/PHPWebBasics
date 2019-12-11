<?php

class Person
{
    /**
     * @var string
     */
    private string $name;
    private int $age;

    /**
     * Person constructor.
     * @param $name
     * @param $age
     */
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    public function __toString()
    {
        return $this->getName() . " - " . $this->getAge();
    }
}

$n = readline();
$people = [];

for ($i = 0; $i < $n; $i++) {
    $persons = readline();
    list($name, $age) = explode(" ", $persons);
    if ($age > 30) {
        $people[] = new Person($name, $age);
    }
}

usort($people, function ($a, $b) {
    return $a->getName() <=> $b->getName();
});

foreach ($people as $person) {
    echo $person . PHP_EOL;
}
