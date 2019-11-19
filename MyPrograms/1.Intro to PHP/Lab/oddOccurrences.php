<?php

//$input = explode(" ", strtolower(readline()));
//$odd = '';
//foreach (array_count_values($input) as $word => $val) {
//    if ($val % 2 !== 0) {
//        $odd .= ", {$word}";
//    }
//}
//echo ltrim($odd, ", ");

$input = explode(" ", strtolower(readline()));
$arr = [];

foreach ($input as $item) {
    if (!array_key_exists($item, $arr)) {
        $arr[$item] = 1;
    } else {
        $arr[$item] += 1;
    }
}

$result = "";
foreach ($arr as $word => $count) {
    if ($count % 2 != 0) {
        $result .= ", {$word}";
    }
}
echo ltrim($result, ", ");
