<?php
$input = explode(" ", readline());
$arr = [];

foreach ($input as $item) {
    if (!array_key_exists($item, $arr)) {
        $arr[$item] = 1;
    } else {
        $arr[$item] += 1;
    }
}
ksort($arr);

foreach ($arr as $item => $value) {
    echo "{$item} -> {$value}" . PHP_EOL;
}