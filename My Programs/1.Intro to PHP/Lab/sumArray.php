<?php

$arr1 = array_map('intval', explode(" ", readline()));
$arr2 = array_map('intval', explode(" ", readline()));
$sumArr = [];
$maxArr = max($arr1, $arr2);
$minArr = min($arr1, $arr2);
$minCount = count($minArr);
$j = 0;
$counter = 0;

for ($i = 0; $i < count($maxArr); $i++, $j++, $counter++) {
    if ($counter == $minCount) {
        $j = 0;
        $counter = 0;
    }
    echo $sumArr[] = $maxArr[$i] + $minArr[$j] . " ";
}
