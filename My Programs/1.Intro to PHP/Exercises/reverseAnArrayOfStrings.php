<?php

$input = explode(" ", readline());

//solution 1
//$input = array_reverse($input);
//
//echo implode(" ", $input);

//solution 2
//for ($i = 0; $i < count($input); $i++) {
//    echo $input[count($input) - $i - 1];
//}

//solution 3
for ($i = count($input) - 1; $i >= 0; $i--) {
    echo $input[$i] . " ";
}