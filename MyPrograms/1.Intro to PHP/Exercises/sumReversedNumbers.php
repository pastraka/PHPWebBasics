<?php
//echo array_reduce(
//    explode(" ", readline()),
//    function ($sum, $el) {
//        return $sum += intval(strrev($el));
//    },
//    0
//);

$input = explode(" ", readline());
$sum = 0;

for ($i = 0; $i < count($input); $i++) {
    $input[$i] = strrev($input[$i]);
    $sum += $input[$i];
}

echo $sum;