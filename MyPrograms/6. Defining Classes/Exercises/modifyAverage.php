<?php
$input = readline();

while (avg($input) < 5) {
    $input .= "9";
}

echo $input;

function avg($num)
{
    $sum = 0;
    $length = strlen($num);
    for ($i = 0; $i < $length; $i++) {
        $sum += $num[$i];
    }
    return $sum / $length;
}