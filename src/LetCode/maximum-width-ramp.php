<?php

/**
 * @param Integer[] $A
 * @return Integer
 */
function maxWidthRamp($A) {
    $count = count($A);
    $s = [];
    $res = 0;
    for ($i = 0; $i < $count; ++$i) {
        $end = end($s);
        if (empty($s) || $A[$end] > $A[$i]) array_push($s,$i);
    };

    for ($i = $count - 1; $i > $res; --$i) {
        while (!empty($s) && $A[end($s)] <= $A[$i]) {
            $res = max($res, $i - end($s));
            array_pop($s);
        }
    }
    return $res;
}

$A = [];

$start = microtime(true);
$res = maxWidthRamp($A);
$end = microtime(true);
echo $end-$start;