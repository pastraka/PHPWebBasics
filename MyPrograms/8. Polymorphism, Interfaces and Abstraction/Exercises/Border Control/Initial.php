<?php

spl_autoload_register();

class Initial
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
            if (count($tokens) == 3) {
                $name = $tokens[0];
                $age = intval($tokens[1]);
                $id = $tokens[2];
                $arr[] = new Person($name, $age, $id);
            }
            if (count($tokens) == 2) {
                $model = $tokens[0];
                $id = $tokens[1];
                $arr[] = new Robot($model, $id);
            }
        }
        $num = readline();
        $len = strlen($num) * -1;

        foreach ($arr as $person) {
            if ($num == substr($person->getId(), $len)) {
                echo $person->getId() . PHP_EOL;
            }
        }
    }
}

$initial = new Initial();
$initial->run();