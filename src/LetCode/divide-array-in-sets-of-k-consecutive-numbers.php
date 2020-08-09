<?php

function isPossibleDivide($nums, $k) {
    sort($nums);
    $kLength = $k;
    $map = [];

    foreach ($nums as $num) {
        if (!isset($map[$num])) {
            $map[$num] = 0;
        }
        $map[$num] ++;
    }

    while (count($map) > 0) {
        $start = array_keys($map)[0];

        for ($i = 0; $i < $kLength; $i ++) {
            if (!isset($map[$start + $i])) {
                return false;
            }
            $map[$start + $i] --;
            if ($map[$start + $i] == 0) {
                unset($map[$start + $i]);
            }
        }
    }
    return true;
}

$nums = [1,2,3,3,4,5];
$k = 3;
var_dump(isPossibleDivide($nums, $k));