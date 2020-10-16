<?php
$input = explode(", ", readline());

function isVolume($x, $y, $z)
{
    $x1 = 10;
    $x2 = 50;
    $y1 = 20;
    $y2 = 80;
    $z1 = 15;
    $z2 = 50;

    if ($x >= $x1 && $x <= $x2) {
        if ($y >= $y1 && $y <= $y2) {
            if ($z >= $z1 && $z <= $z2) {
                return true;
            }
        }
    }
    return false;
}

$num = count($input);

for ($i = 0; $i < $num; $i += 3) {
    $x = intval($input[$i]);
    $y = intval($input[$i + 1]);
    $z = intval($input[$i + 2]);

    if (isVolume($x, $y, $z)) {
        echo "inside" . PHP_EOL;
    } else {
        echo "outside" . PHP_EOL;
    }
}