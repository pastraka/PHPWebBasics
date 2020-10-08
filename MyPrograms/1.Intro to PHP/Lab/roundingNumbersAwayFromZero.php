<?php

$input = readline();
$arr = [];
$arr = explode(" ", $input);

for ($i = 0; $i < count($arr); $i++) {
    echo $arr[$i] . " => " . round($arr[$i]) . PHP_EOL;
}