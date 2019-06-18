<?php

$input = explode(" ", readline());
$sum = 0;

for ($i = 0; $i < count($input); $i++) {
    $input[$i] = strrev($input[$i]);
    $sum += $input[$i];
}

echo $sum;