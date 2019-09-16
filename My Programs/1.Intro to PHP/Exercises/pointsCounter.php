
$teamScore = array();
$squadTeam = array();

while (true) {
    $text = trim(fgets(STDIN));

    if ($text == "Result") {
        break;
    }
    $forbidden = array("@", "%", "$", "*", "&");
    $pureText = str_replace($forbidden, "", $text);

    $line = explode("|", $pureText);

    if ($line[0] === strtoupper($line[0])) {
        $team = $line[0];
        $player = $line[1];
    } else {
        $team = $line[1];
        $player = $line[0];
    }
    $points = $line[2];
    $squadTeam[$team][$player] = $points;
    arsort($squadTeam[$team]);
}
foreach ($squadTeam as $key => $value) {
    arsort($value);
    if (!array_key_exists($key, $teamScore)) {
        $teamScore[$key] = 0;
    }

    foreach ($value as $k => $v) {
        $teamScore[$key] += $v;
    }
}
arsort($teamScore);
foreach ($teamScore as $name => $value) {
    echo "$name => $value" . PHP_EOL;
    echo "Most points scored by " . key($squadTeam[$name]) . PHP_EOL;
}