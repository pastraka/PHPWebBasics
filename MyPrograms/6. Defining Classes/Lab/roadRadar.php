<?php
$speed = intval(readline());
$area = readline();

function limit($area)
{
    switch ($area) {
        case 'motorway':
            $speedLimit = 130;
            break;
        case 'interstate':
            $speedLimit = 90;
            break;
        case 'city':
            $speedLimit = 50;
            break;
        case 'residential':
            $speedLimit = 20;
            break;
        default:
            echo "Not a Valid Input";
            $speedLimit = 1000;
    }
    return $speedLimit;
}

function currSpeed($speed, $area)
{
    $topSpeed = limit($area);
    $diff = $speed - $topSpeed;
    if ($diff >= 0 && $diff <= 20) return "speeding";
    else if ($diff > 20 && $diff <= 40) return "excessive speeding";
    else if ($diff > 40) return "reckless driving";
}

echo currSpeed($speed, $area);