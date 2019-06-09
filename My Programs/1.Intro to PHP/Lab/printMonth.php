<?php

$input = intval(readline());
$month = ["Invalid Month!", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
    "November", "December"];
foreach ($month as $item) {
    if ($input < 1 || $input > 12) {
        echo "Invalid Month!";
        return;
    }
    $item = $input;
    echo $month[$item];
    return;
}