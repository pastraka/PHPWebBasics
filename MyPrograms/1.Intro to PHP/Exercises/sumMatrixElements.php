<?php
$input = explode(", ", readline());
$rows = $input[0];
$columns = $input[1];
$sum = 0;

for ($i = 0; $i < $rows; $i++) {
    $lines = explode(", ", readline());
    for ($j = 0; $j < count($lines); $j++) {
        $sum += $lines[$j];
    }
}
echo $rows . PHP_EOL . $columns . PHP_EOL . $sum;