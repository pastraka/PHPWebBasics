<?php
$input = readline();
$arr = [];
/////////////////////////////////////////////////////////////////////
//while ($input != 'Over') {
//    $tokens = explode(' : ', $input);
//    if (is_numeric($tokens[0])) {
//        $number = $tokens[0];
//        $name = $tokens[1];
//    } else {
//        $name = $tokens[0];
//        $number = $tokens[1];
//    }
//
//    if (!key_exists($name, $arr)) {
//        $arr[$name] = $number;
//    }
//    $input = readline();
//}
//////////////////////////////////////////////////////////////////////
while ($input != 'Over') {
    $tokens = explode(' : ', $input);
    $currentEl = str_split($tokens[0]);
    $current = ord($currentEl[0]);
    if ($current >= 48 && $current <= 57) {
        $number = $tokens[0];
        $name = $tokens[1];
    } else {
        $name = $tokens[0];
        $number = $tokens[1];
    }

    if (!key_exists($name, $arr)) {
        $arr[$name] = $number;
    }
    $input = readline();
}
ksort($arr);
foreach ($arr as $key => $item) {
    echo "$key -> $item" . PHP_EOL;
}