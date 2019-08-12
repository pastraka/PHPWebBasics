<?php
$input = explode(" ", readline());
$maxFreq = 0;
$output = "";
foreach (array_count_values($input) as $key => $value) {
    if ($value > $maxFreq) {
        $maxFreq = $value;
        $output = $key;
    }
}
echo $output;