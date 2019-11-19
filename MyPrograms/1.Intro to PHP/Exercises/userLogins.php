<?php
$input = readline();
$arr = [];
$counter = 0;

while (true) {
    if ($input == "login") {
        break;
    }
    $tokens = explode(" -> ", $input);
    $arr[$tokens[0]] = $tokens[1];

    $input = readline();
}
$input = readline();
while (true) {
    if ($input == "end") {
        break;
    }
    $tokens = explode(" -> ", $input);
    if (key_exists($tokens[0], $arr) && $arr[$tokens[0]] == $tokens[1]) {
        echo "$tokens[0]: logged in successfully" . PHP_EOL;
    } else {
        echo "$tokens[0]: login failed" . PHP_EOL;
        $counter++;
    }
    $input = readline();
}
echo "unsuccessful login attempts: $counter";