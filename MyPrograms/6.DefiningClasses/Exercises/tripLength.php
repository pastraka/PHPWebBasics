<?php
$input = explode(", ", readline());
shortestSegment($input);
function shortestSegment($input)
{
    list($x1, $y1, $x2, $y2, $x3, $y3) = $input;
    $short12 = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
    $short23 = sqrt(pow($x3 - $x2, 2) + pow($y3 - $y2, 2));
    $short13 = sqrt(pow($x3 - $x1, 2) + pow($y3 - $y1, 2));

    if ($short12 <= $short13 && $short13 >= $short23) {
        $first = $short12 + $short23;
        echo "1->2->3: {$first}";
    } elseif ($short12 <= $short23 && $short13 < $short23) {
        $second = $short13 + $short12;
        echo "2->1->3: {$second}";
    } else {
        $third = $short23 + $short13;
        echo "1->3->2: {$third}";
    }
}

