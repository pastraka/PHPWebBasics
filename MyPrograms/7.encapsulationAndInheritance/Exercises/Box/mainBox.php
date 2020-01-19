<?php

require_once "Box.php";

$length = floatval(readline());
$width = floatval(readline());
$height = floatval(readline());

$box = new Box($length, $width, $height);
$volume = $box->getVolume();
$lateralSurfaceArea = $box->getLateralSurfaceArea();
$surfaceArea = $box->getServiceArea();

$volume = number_format($volume, 2, '.', '');
$surfaceArea = number_format($surfaceArea, 2, '.', '');
$lateralSurfaceArea = number_format($lateralSurfaceArea, 2, '.', '');

echo "Surface Area - {$surfaceArea}" . PHP_EOL;
echo "Lateral Surface Area - {$lateralSurfaceArea}" . PHP_EOL;
echo "Volume - {$volume}" . PHP_EOL;