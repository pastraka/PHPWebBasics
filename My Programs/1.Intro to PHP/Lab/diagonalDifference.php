<?php

$n = intval(readline());
$matrix = [];

for ($i = 0; $i < $n; $i++) {
    $matrix[$i] = explode(" ", readline());
}
$primarySum = 0;
$secondarySum = 0;

for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n; $j++) {
        if ($j == $i) {
            $primarySum += $matrix[$j];
        }
    }
}