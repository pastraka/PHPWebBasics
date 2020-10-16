<?php
$input = explode(", ", readline());
list($x1, $y1, $x2, $y2) = $input;
output($x1, $y1, 0, 0);
output($x2, $y2, 0, 0);
output($x1, $y1, $x2, $y2);

function isValid($x1, $y1, $x2, $y2)
{
    $distance = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
    if ($distance == intval($distance)) {
        return true;
    }
    return false;
}

function output($x1, $y1, $x2, $y2)
{
    if (isValid($x1, $y1, $x2, $y2)) {
        echo "{{$x1}, {$y1}} to {{$x2}, {$y2}} is valid" . PHP_EOL;
    } else {
        echo "{{$x1}, {$y1}} to {{$x2}, {$y2}} is invalid" . PHP_EOL;
    }
}