<?php

$input = readline();
$arr = [];

for ($i = 0; $i < strlen($input); $i++) {
    if (!array_key_exists($input[$i], $arr)) {
        $arr[$input[$i]] = 1;
    } else {
        $arr[$input[$i]] += 1;
    }
}
foreach ($arr as $item => $value) {
    echo "{$item} -> {$value}" . PHP_EOL;
}