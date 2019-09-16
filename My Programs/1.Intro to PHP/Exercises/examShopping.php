<?php
$input = readline();
$inventory = [];

while (true) {
    if ($input == "shopping time") {
        break;
    }
    $tokens = explode(" ", $input);
    if (!key_exists($tokens[1], $inventory)) {
        $inventory[$tokens[1]] = 0;
    }
    $inventory[$tokens[1]] += intval($tokens[2]);

    $input = readline();
}
$input = readline();

while (true) {
    if ($input == "exam time") {
        break;
    }
    $tokens = explode(" ", $input);
    if (!key_exists($tokens[1], $inventory)) {
        echo "$tokens[1] doesn't exist" . PHP_EOL;
    } elseif ($inventory[$tokens[1]] <= 0) {
        echo "$tokens[1] out of stock" . PHP_EOL;
    } else {
        $inventory[$tokens[1]] -= $tokens[2];
    }

    $input = readline();
}
foreach ($inventory as $name => $qty) {
    if ($qty > 0) {
        echo "$name -> $qty" . PHP_EOL;
    }
}