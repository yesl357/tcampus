<?php

/**
 * @param String $num1
 * @param String $num2
 * @return String
 */
function multiply($num1, $num2) {
    $num1 = array_reverse(str_split($num1));
    $num2 = array_reverse(str_split($num2));

    $res = [];

    for ($i = 0; $i < count($num1); $i++) {
        for ($j = 0; $j < count($num2); $j++) {
            if (!isset($res[$i + $j])) {
                $res[$i + $j] = $num1[$i] * $num2[$j];
            } else {
                $res[$i + $j] += $num1[$i] * $num2[$j];
            }
        }
    }
    for ($i = 0; $i < count($res); $i++) {
        if ($res[$i] > 10) {
            $res[$i + 1] += floor($res[$i] / 10);
            $res[$i] = $res[$i] % 10;
        }
    }

    return implode('', array_reverse($res));
}

echo multiply('5', '12');