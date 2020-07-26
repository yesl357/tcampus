<?php

/**
 * @param String $s
 * @return Integer
 */
function lengthOfLongestSubstring($s) {
    $length = strlen($s);

    $resArr = [];
    $right = 0;
    $res = 0;
    for ($i = 0; $i < $length; $i ++) {
        while (true) {
            if ($right >= $length) {
                break 2;
            }
            if (!in_array($s[$right], $resArr)) {
                array_push($resArr, $s[$right]);
                $right ++;
                if (count($resArr) > $res) {
                    $res = count($resArr);
                }
            } else {
                array_shift($resArr);
                break;
            }
        }
    }

    if (count($resArr) > $res) {
        $res = count($resArr);
    }

    return $res;
}

$s = 'bbbbb';
$res = lengthOfLongestSubstring($s);
var_dump($res);