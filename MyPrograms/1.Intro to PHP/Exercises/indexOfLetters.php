<?php

$input = strtolower(readline());
//$arr = explode(" ", "a b c d e f g h i j k l m n o p q r s t u v w x y z");
//
//for ($i = 0; $i < strlen($input); $i++) {
//    foreach ($arr as $item) {
//        if ($input[$i] === $item) {
//            echo $input[$i] . " -> " . array_search($item, $arr) . PHP_EOL;
//        }
//    }
//}

$alphabet = "abcdefghijklmnopqrstuvwxyz";
for ($i = 0; $i < strlen($input); $i++) {
    echo $input[$i] . " -> " . strpos($alphabet, $input[$i]) . PHP_EOL;
}
