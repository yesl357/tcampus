<?php

function makeGood($s) {
    while (1) {
        $count = strlen($s);
        for ($i = 0; $i < $count - 1; $i++) {
            if (abs(ord($s[$i]) - ord($s[$i + 1])) == 32) {
                $s = substr($s, 0, $i).substr($s, $i + 2);
                break;
            }
        }
    }

    return $s;
}
function findKthBit($n, $k) {
    $dp = [];
    $dp[1] = '1';
    for ($i = 2; $i <= $n; $i++) {
        $dp[$i] = $dp[$i - 1].'1'.strrev($this->invert($dp[$i - 1]));
        }

    return $dp[$n][$k - 1];
}

function invert($s) {
    $ans = '';
    $length = strlen($s);
    for ($i = 0; $i < $length; $i++) {
        $ans .= $s[$i] == '1' ? '0' : '1';
    }

    return $ans;
}



function maxNonOverlapping($nums, $target) {
    $dp = [];
    $sumsRecord = [
        0 => 0
    ];
    $length = count($nums);
    $sums = 0;

    $res = 0;
    for ($i = 0; $i < $length; $i ++) {
        $sums += $nums[$i];

        if (isset($sumsRecord[$sums - $target])) {
            $res ++;
            $sumsRecord = [];
            $sums = 0;
        }

        $sumsRecord[$sums] = $i;
    }

    return $res;
}
