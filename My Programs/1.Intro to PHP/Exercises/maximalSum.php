<?php

$input = explode(" ", readline());
$rowSize = $input[0];
$columnSize = $input[1];
$matrix = [];

for ($row = 0; $row < $rowSize; $row++) {
    $matrix[$row] = array_map("intval", explode(" ", readline()));
}

$totalSum = 0;
$initialRow = 0;
$initialCol = 0;

for ($row = 0; $row < count($matrix) - 3; $row++) {
    for ($col = 0; $col < count($matrix[$row]) - 3; $col++) {
        $currentSum = $matrix[$row][$col]
                    + $matrix[$row][$col + 1]
                    + $matrix[$row][$col + 2]
                    + $matrix[$row + 1][$col]
                    + $matrix[$row + 1][$col + 1]
                    + $matrix[$row + 1][$col + 2]
                    + $matrix[$row + 2][$col]
                    + $matrix[$row + 2][$col + 1]
                    + $matrix[$row + 2][$col + 2];
        if ($currentSum > $totalSum) {
            $totalSum = $currentSum;
            $initialRow = $row;
            $initialCol = $col;
        }
    }
}

echo "Sum = " . $totalSum . PHP_EOL;
for ($row = $initialRow; $row < $initialRow + 3; $row++) {
    for ($col = $initialCol; $col < $initialCol + 3; $col++) {
        echo $matrix[$row][$col] . " ";
    }
    echo PHP_EOL;
}