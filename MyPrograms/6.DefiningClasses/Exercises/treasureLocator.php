<?php
$input = explode(", ", readline());

for ($i = 0; $i < count($input); $i += 2) {
    $vertical = $input[$i];
    $horizontal = $input[$i + 1];
    echo locate($vertical, $horizontal) . PHP_EOL;
}

function locate($vertical, $horizontal)
{
    if ($vertical >= 8 && $vertical <= 9 && $horizontal >= 0 && $horizontal <= 1) {
        return "Tokelau";
    } elseif ($vertical >= 1 && $vertical <= 3 && $horizontal >= 1 && $horizontal <= 3) {
        return "Tuvalu";
    } elseif ($vertical >= 5 && $vertical <= 7 && $horizontal >= 3 && $horizontal <= 6) {
        return "Samoa";
    } elseif ($vertical >= 0 && $vertical <= 2 && $horizontal >= 6 && $horizontal <= 8) {
        return "Tonga";
    } elseif ($vertical >= 4 && $vertical <= 9 && $horizontal >= 7 && $horizontal <= 8) {
        return "Cook";
    } else {
        return "On the bottom of the ocean";
    }
}