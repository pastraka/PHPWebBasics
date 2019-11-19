<?php
//$arr = explode(" ", readline());
//$bestStart = 0;
//$bestLength = 0;
//$length = 0;
//
//for ($i = 0; $i < count($arr) - 1; $i++) {
//    $length = 0;
//    while ($arr[$i + $length] == $arr[$i + 1 + $length]) {
//        $length++;
//        if ($i + 1 + $length > count($arr) - 1) {
//            break;
//        }
//    }
//    if ($length > $bestLength) {
//        $bestLength = $length;
//        $bestStart = $i;
//    }
//}
//for ($i = $bestStart; $i <= $bestLength + $bestStart; $i++) {
//    echo "{$arr[$i]} ";
//}

$inputArr = explode(" ", readline());
$maxCount = 0;
$element = "";

for ($row = 0; $row < count($inputArr); $row++) {
    $currentCount = 0;
    for ($col = $row; $col < count($inputArr); $col++) {
        if ($inputArr[$row] == $inputArr[$col]) {
            $currentCount++;
            if ($currentCount > $maxCount) {
                $maxCount = $currentCount;
                $element = $inputArr[$row];
            }
        } else {
            break;
        }
    }
}

for ($i = 0; $i < $maxCount; $i++) {
    echo $element . " ";
}