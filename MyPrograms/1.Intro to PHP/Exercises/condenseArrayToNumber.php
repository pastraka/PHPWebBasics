<?php
$arr = explode(" ", readline());
while (count($arr) > 1) {
    if (count($arr) > 1) {
        $condensed = [];
        for ($i = 0; $i < count($arr) - 1; $i++) {
            $condensed[$i] = $arr[$i] + $arr[$i + 1];
        }
        $arr = $condensed;
    }
}
echo $arr[0];
