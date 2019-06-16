<?php

$n = intval(readline());
$matrix = [];

for ($i = 0; $i < $n; $i++) {
    $matrix[$i] = explode(" ", readline());
}
$primarySum = 0;
$secondarySum = 0;
for ($i = 0; $i < $n; $i++) {
    $primarySum += $matrix[$i][$i];
}
for ($j = 0; $j < $n; $j++) {
    $secondarySum += $matrix[$j][$n - $j - 1];
}
echo abs($secondarySum - $primarySum);