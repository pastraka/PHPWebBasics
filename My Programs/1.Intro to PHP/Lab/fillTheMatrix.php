 <?php
//
//$rows = 4;
//$cols = 4;
//$count = 1;
//$matrix = [];
//
//for ($r = 0; $r < $rows; $r++) {
//    $matrix[$r] = [];
//    for ($c = 0; $c < $cols; $c++) {
//        $matrix[$r][$c] = $count++;
//    }
//}

list($matrixSize, $pattern) = explode(", ", readline());
if (strtoupper($pattern) == "A") {
    $matrix = createMatrixA($matrixSize);
} elseif (strtoupper($pattern) == "B") {
    $matrix = createMatrixB($matrixSize);
}

printMatrix($matrix);

function printMatrix($matrix)
{
    for ($row = 0; $row < count($matrix); $row++) {
        for ($col = 0; $col < count($matrix); $col++) {
            echo "{$matrix[$row][$col]} ";
        }
        echo PHP_EOL;
    }
}

function createMatrixA($size)
{
    $arr = [];
    $num = 1;

    for ($col = 0; $col < $size; $col++) {
        for ($row = 0; $row < $size; $row++) {
            $arr[$row][$col] = $num;
            $num++;
        }
    }
    return $arr;
}

function createMatrixB($size)
{
    $arr = [];
    $num = 1;
    for ($col = 0; $col < $size; $col++) {
        if ($col % 2 == 0) {
            for ($row = 0; $row < $size; $row++) {
                $arr[$row][$col] = $num;
                $num++;
            }
        } else {
            for ($row = $size - 1; $row >= 0; $row--) {
                $arr[$row][$col] = $num;
                $num++;
            }
        }
    }
    return $arr;
}

