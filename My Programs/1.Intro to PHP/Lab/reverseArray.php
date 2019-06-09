<?php

$n = intval(readline());
$arr = [];

for ($i = 0; $i < $n; $i++) {
    $input = intval(readline());
    $arr[] = $input;
}

for ($i = count($arr) - 1; $i >= 0; $i--) {
    echo $arr[$i] . " ";
}