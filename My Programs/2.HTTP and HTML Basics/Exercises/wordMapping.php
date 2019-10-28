<?php
if (isset($_GET['input']) && !empty(trim($_GET['input']))) {
    $text = trim($_GET['input']);
    preg_match_all("/[A-Za-z]+/", $text, $words);
    $words = array_map("strtolower", $words[0]);
    $wordsCount = [];
    foreach ($words as $word) {
        if (array_key_exists($words, $wordsCount)) {
            $wordsCount [$word] = 0;
        }
        $wordsCount[$word]++;
    }
    echo table($wordsCount);
}

function table($items)
{
    $result = "<table border='2'>";
    foreach ($items as $key => $val) {
        $result .= "<tr><td>{$key}</td><td>{$val}</td></tr>";
    }
    $result .= "</table>";
    return $result;
}