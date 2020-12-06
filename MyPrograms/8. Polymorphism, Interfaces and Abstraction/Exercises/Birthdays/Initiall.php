<?php

spl_autoload_register();

class Initiall
{
    const INPUT_END_COMMAND = "End";

    public function run()
    {
        $this->readData();
    }

    private function readData()
    {
        $arr = [];
        while (1) {
            $input = readline();
            if ($input == self::INPUT_END_COMMAND) {
                break;
            }

            $tokens = explode(" ", $input);
            if ($tokens[0] == "Citizen") {
                $name = $tokens[1];
                $age = intval($tokens[2]);
                $id = $tokens[3];
                $birthdate = $tokens[4];
                $arr[] = new Personn($name, $age, $id, $birthdate);
            } else if ($tokens[0] == "Robot") {
                continue;
            } else if ($tokens[0] == "Pet") {
                $petName = $tokens[1];
                $birthD = $tokens[2];
                $arr[] = new Pet($petName, $birthD);
            }
        }

        $year = readline();
        $var = -4;
        $anchor = false;

        foreach ($arr as $person) {
            if (substr($year, $var) == substr($person->getBirthdate(), $var)) {
                echo $person->getBirthdate() . PHP_EOL;
                $anchor = true;
            }
        }
        if ($anchor == false) {
            echo "<no output>";
        }
    }
}

$initial = new Initiall();
$initial->run();