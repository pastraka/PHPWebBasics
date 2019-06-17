<?php

$input = explode(", ", readline());
$arr = [];

for ($i = 1; $i < count($input); $i += 2) {
    $city = $input[$i - 1];
    $income = $input[$i];

    if (!array_key_exists($city, $arr)) {
        $arr[$city] = $income;
    } else {
        $arr[$city] += $income;
    }
}
foreach ($arr as $town => $income) {
    echo "{$town} => {$income}" . PHP_EOL;
}