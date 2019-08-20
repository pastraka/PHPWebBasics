<?php

$inputArr = explode(" ", readline());
$maxCount = 0;
$startIndex = 0;

for ($row = 0; $row < count($inputArr); $row++) {
    $currentCount = 0;
    for ($col = $row; $col < count($inputArr) - 1; $col++) {
        if ($inputArr[$col] < $inputArr[$col + 1]) {
            $currentCount++;
            if ($currentCount > $maxCount) {
                $maxCount = $currentCount;
                $startIndex = $row;
            }
        } else {
            break;
        }
    }
}

for ($i = 0; $i <= $maxCount; $i++) {
    echo $inputArr[$startIndex + $i] . " ";
}