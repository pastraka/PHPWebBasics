<?php
$input = readline();
$arr = [];

while (true) {
    if ($input == "END") {
        break;
    }
    $tokens = explode(" ", $input);
    if ($tokens[0] == "A") {
        $name = $tokens[1];
        $phone = $tokens[2];
        if (!key_exists($name, $arr)) {
            $arr[$name] = [];
            $arr[$name] = $phone;
        } else {
            $arr[$name] = $phone;
        }
    } elseif ($tokens[0] == "S") {
        $name = $tokens[1];
        if (!key_exists($name, $arr)) {
            echo "Contact {$name} does not exist." . PHP_EOL;
        } else {
            echo "{$name} -> {$arr[$name]}" . PHP_EOL;
        }
    }
    $input = readline();
}