<?php

list($row, $col) = explode(", ", readline());
$matrix = [];

for ($i = 0; $i < $row; $i++) {
    $matrix[$i] = explode(", ", readline());
}

$min = PHP_INT_MAX;
$max = PHP_INT_MIN;

foreach ($matrix as $key => $val) {
    foreach ($val as $num) {
        if ($num > $max) {
            $max = intval($num);
        }
        if ($num < $min) {
            $min = intval($num);
        }
    }
}
echo "Min: {$min}" . PHP_EOL;
echo "Max: {$max}" . PHP_EOL;