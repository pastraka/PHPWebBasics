<?php
$input = readline();
$arrAge = [];
$arrSalary = [];
$arrPosition = [];

while (true) {
    if ($input == "filter base") {
        break;
    }
    $tokens = explode(" -> ", $input);
    $name = $tokens[0];
    if (filter_var($tokens[1], FILTER_VALIDATE_INT)) {
        $age = intval($tokens[1]);
        $arrAge[$name] = $age;
    } elseif (filter_var($tokens[1], FILTER_VALIDATE_FLOAT)) {
        $salary = $tokens[1];
        $arrSalary[$name] = $salary;
    } else {
        $position = $tokens[1];
        $arrPosition[$name] = $position;
    }

    $input = readline();
}

$input = readline();
if ($input == "Age") {
    foreach ($arrAge as $key => $item) {
        echo "Name: $key" . PHP_EOL;
        echo "Age: $item" . PHP_EOL;
        echo str_repeat("=", 20) . PHP_EOL;
    }
} elseif ($input == "Position") {
    foreach ($arrPosition as $key => $item) {
        echo "Name: $key" . PHP_EOL;
        echo "Position: $item" . PHP_EOL;
        echo str_repeat("=", 20) . PHP_EOL;
    }
} else {
    foreach ($arrSalary as $key => $item) {
        echo "Name: $key" . PHP_EOL;
        printf("Salary: %.02f" . PHP_EOL, $item);
        echo str_repeat("=", 20) . PHP_EOL;
    }
}