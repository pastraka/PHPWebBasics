<?php

use Factories\VehicleFactory;

spl_autoload_register(function ($class) {
    require_once str_replace("\\", DIRECTORY_SEPARATOR, $class) . <<<TAG
.php
TAG;
});

$vehicles = [];
$factory = new VehicleFactory();

// Traverse files
$count = 0;
foreach (scandir("Vehicles") as $file) {
    if ($file == "." || $file == "..") {
        continue;
    }
    $file = str_replace(".php", "", $file);
    try {
        $info = new ReflectionClass("Vehicles\\" . $file);
    } catch (ReflectionException $e) {
    }
    if (isset($info)) {
        if (!$info->isAbstract() && !$info->isInterface()) {
            $count++;
        }
    }
}

for ($i = 0; $i < $count; $i++) {
    list($type, $quantity, $consumption) = explode(" ", readline());
    try {
        $vehicle = $factory->create($type, $quantity, $consumption);
    } catch (Exception $e) {
    }
    if (isset($vehicle)) {
        $vehicles[$type] = $vehicle;
    }
}

$n = readline();

for ($i = 0; $i < $n; $i++) {
    list($action, $type, $param) = explode(" ", readline());
    $vehicle = $vehicles[$type];
    $action = strtolower($action);
    echo $vehicle->$action($param);
}

foreach ($vehicles as $vehicle) {
    echo $vehicle . PHP_EOL;
}