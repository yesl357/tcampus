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


function minCost($n, $cuts) {
    sort($cuts);
    $res = 0;

    while (1) {
        $length = count($cuts);
        if ($length == 1) {
            $res += $n;
            break;
        }

        $tmp = [];
        for ($i = 0; $i < $length; $i++) {
            if ($i == 0) {
                $tmp[$i] = $cuts[$i] - 0 + $cuts[$i + 1] - $cuts[$i];
            } else if ($i == $length - 1) {
                $tmp[$i] = $cuts[$i] - $cuts[$i - 1] + $n - $cuts[$i];
            } else {
                $tmp[$i] = $cuts[$i] - $cuts[$i - 1] + $cuts[$i + 1] - $cuts[$i];
            }
        }
        $step = findMin($tmp);

        $res += $tmp[$step];
        echo "{$step} -- {$tmp[$step]}\n";
        unset($cuts[$step]);
        $cuts = array_values($cuts);
    }




    return $res;
}

function findMin($arr) {
    $res = 0;
    foreach ($arr as $key => $value) {
        if ($value < $arr[$res]) {
            $res = $key;
        }
    }

    return $res;
}

minCost(36, [13,17,15,18,3,22,27,6,35,7,11,28,26,20,4,5,21,10,8]);