<?php

$arr = array_map('intval', explode(" ", readline()));
$bool = false;

for ($i = 0; $i < count($arr); $i++) {
    for ($j = $i + 1; $j < count($arr); $j++) {
        $sum = $arr[$i] + $arr[$j];
        for ($k = 0; $k < count($arr); $k++) {
            if ($sum == $arr[$k]) {
                echo $arr[$i] . " + " . $arr[$j] . " == " . $arr[$k] . PHP_EOL;
                $bool = true;
            }
        }
    }
}
if ($bool == false) {
    echo "No";
}