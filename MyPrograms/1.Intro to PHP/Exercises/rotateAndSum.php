<?php
//$input = "3 2 4 -1";
$input = explode(" ", readline());
$n = intval(readline());
$arr = [];
$result = [];

for ($i = $n; $i > 0; $i--) {
    $temp = array_pop($input);
    array_unshift($input, $temp);
    $arr[$i] = $input;
    $length = count($arr[$i]);
}

for ($j = 0; $j < $length; $j++) {
    $temp = array_sum(array_column($arr, $j));
    array_unshift($result, $temp);
}
$result = array_reverse($result);
//var_dump($result);
echo implode(" ", $result);



