<?php
$input = explode(", ", readline());
$rowSize = $input[0];
$columnSize = $input[1];
$matrix = [];

//!!!FILLING MATRIX!!!!!!!!!!!!!!!!!!!FILLING MATRIX!!!!!!!!!!!!!!!!!FILLING MATRIX!!!!!!!!!!
//for ($row = 0; $row < $rowSize; $row++){
//   $input = explode(", ", readline());
//    for ($col = 0; $col < $columnSize; $col++){
//      $matrix[$row][$col] = $input[$col];
//   }
//}

for ($row = 0; $row < $rowSize; $row++) {
    $matrix[$row] = array_map("intval", explode(", ", readline()));
}

$totalSum = 0;
$initialRow = 0;
$initialCol = 0;

for ($row = 0; $row < count($matrix) - 1; $row++) {
    for ($col = 0; $col < count($matrix[$row]) - 1; $col++) {
        $currentSum = $matrix[$row][$col]
                    + $matrix[$row][$col + 1]
                    + $matrix[$row + 1][$col]
                    + $matrix[$row + 1][$col + 1];
        if ($currentSum > $totalSum) {
            $totalSum = $currentSum;
            $initialRow = $row;
            $initialCol = $col;
        }
    }
}

for ($row = $initialRow; $row < $initialRow + 2; $row++) {
    for ($col = $initialCol; $col < $initialCol + 2; $col++) {
        echo $matrix[$row][$col] . " ";
    }
    echo PHP_EOL;
}
echo $totalSum;
