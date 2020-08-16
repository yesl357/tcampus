<?php

/**
 * @param Integer[] $position
 * @param Integer $m
 * @return Integer
 */
function maxDistance($position, $m) {

}

$position = [1,2,3,4,7]; $m = 3;



ini_set('memory_limit', '1024M');
function minDays($n) {
    $dp = [];
    $dp[1] = 1;
    $dp[2] = 2;
    $dp[3] = 2;

    for ($i = 4; $i <= $n; $i ++) {
        if ($i % 6 == 0) {
//            if ($dp[$i/3] < $dp[$i / 2]) {
//                echo 11111;die;
//            }
            $dp[$i] = min($dp[$i/2],$dp[$i/3]) + 1;
        } elseif ($i % 2 == 0) {
            $dp[$i] = min($dp[$i - 1],$dp[$i/2]) + 1;
        } elseif ($i % 3 == 0) {
            $dp[$i] = min($dp[$i - 1],$dp[$i/3]) + 1;
        } else {
            $dp[$i] = $dp[$i - 1] + 1;
        }

    }

    return $dp[$n];
}


function minDays2($n) {
    while ($n) {
//        if ($n)
    }
}
//9459568
var_dump(minDays(10));
