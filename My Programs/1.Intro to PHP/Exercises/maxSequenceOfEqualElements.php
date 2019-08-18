<?php
$arr = explode(" ", readline());
$bestStart = 0;
$bestLength = 0;
$length = 0;

for ($i = 0; $i < count($arr) - 1; $i++) {
    $length = 0;
    while ($arr[$i + $length] == $arr[$i + 1 + $length]) {
        $length++;
        if ($i + 1 + $length > count($arr) - 1) {
            break;
        }
    }
    if ($length > $bestLength) {
        $bestLength = $length;
        $bestStart = $i;
    }
}
for ($i = $bestStart; $i <= $bestLength + $bestStart; $i++) {
    echo "{$arr[$i]} ";
}
