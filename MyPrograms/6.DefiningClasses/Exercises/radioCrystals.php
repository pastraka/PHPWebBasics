<?php

$crystals = explode(", ", readline());
$desiredThick = array_shift($crystals);

if ($desiredThick > 0) {
    $cut = function ($crystalThickness) {
        $crystalThickness /= 4;
        return $crystalThickness;
    };

    $lap = function ($crystalThickness) {
        $crystalThickness -= 0.2 * $crystalThickness;
        return $crystalThickness;
    };

    $grind = function ($crystalThickness) {
        $crystalThickness -= 20;
        return $crystalThickness;
    };

    $etch = function ($crystalThickness) {
        $crystalThickness -= 2;
        return $crystalThickness;
    };

    $xRay = function ($crystalThickness) {
        $crystalThickness += 1;
        return $crystalThickness;
    };

    $wash = function ($crystalThickness) {
        $crystalThickness = floor($crystalThickness);
        return $crystalThickness;
    };

    foreach ($crystals as $crystal) {
        $result = "Processing chunk $crystal microns" . PHP_EOL;
        $operations = ["Cut" => $cut, "Lap" => $lap, "Grind" => $grind];

        foreach ($operations as $operationName => $operation) {
            $newCrystal = $crystal;
            $count = -1;

            while ($newCrystal >= $desiredThick) {
                $crystal = $newCrystal;
                $count += 1;
                $newCrystal = $operation($newCrystal);
            }

            if ($count > 0) {
                $result .= "$operationName x{$count}" . PHP_EOL;
                $result .= "Transporting and washing" . PHP_EOL;
                $crystal = $wash($crystal);
            }

            if ($crystal == $desiredThick) {
                break;
            }
        }

        if ($crystal == $desiredThick) {
            $result .= "Finished crystal $crystal microns" . PHP_EOL;
        } else {
            $newCrystal = $crystal;
            $count = 0;

            while ($newCrystal > $desiredThick) {
                $count += 1;
                $newCrystal = $etch($newCrystal);
            }

            if ($count > 0) {
                $result .= "Etch x{$count}" . PHP_EOL;
                $result .= "Transporting and washing" . PHP_EOL;
                $newCrystal = $wash($newCrystal);
            }

            if ($newCrystal == $desiredThick) {
                $result .= "Finished crystal $newCrystal microns" . PHP_EOL;
            } else {
                $count = 0;

                while ($newCrystal < $desiredThick) {
                    $count += 1;
                    $newCrystal = $xRay($newCrystal);
                }

                $result .= "X-ray x{$count}" . PHP_EOL;
                $result .= "Finished crystal $newCrystal microns" . PHP_EOL;
            }
        }
        echo $result;
    }
}