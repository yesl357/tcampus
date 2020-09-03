<?php


function containsPattern($arr, $m, $k) {
    $length = count($arr);

    $needLength = $m * $k;
    $count = 0;
    for ($i = 0; $i <= $length - $needLength; $i ++) {
        $flag = true;
        for ($j = 0; $j < $needLength; $j ++) {
            if ($j < $m) {
                continue;
            } else {
                if ($arr[$i + $j] != $arr[$i + $j - $m]) {
                    $flag = false;
                    break;
                } else {
                    continue;
                }
            }
        }

        if ($flag) {
            return true;
        }
    }

    return false;
}

$arr = [1,2,4,4,4,4];
$m = 1;
$k = 3;
containsPattern($arr, $m, $k);



function getMaxLen($nums) {
    $dp = $negatives = [];
    $length = count($nums);
    $negative = 0;
    $a = 0;
    // if ($nums[0] > 0) {
    //     $dp[0] = 1;
    //     $a ++;
    // } elseif ($nums[0] == 0) {
    //     $dp[0] = 0;
    // } else {
    //     $dp[0] = 1;
    //     $negative ++;
    // }
    // $negatives[0] = $negative;

    $firstNagetive = -1;
    $first = -1;
    for ($i = 0; $i < $length; $i++) {
        if ($nums[$i] > 0) {
            if ($first == - 1) {
                $first = $i;
                $dp[$i] = 1;
            } else {
                if ($firstNagetive == -1) {
                    $dp[$i] = $i - $first + 1;
                } else {
                    if ($negative % 2 == 0) {
                        $dp[$i] = $i - $first + 1;
                    } else {
                        $dp[$i] = $i - $firstNagetive;
                    }
                }
            }
            $a ++;
        } elseif ($nums[$i] == 0) {
            $dp[$i] = 0;
            $firstNagetive = -1;
            $first = -1;
            $negative = 0;
        } else {
            if ($firstNagetive == -1) {
                $firstNagetive = $i;
                $dp[$i] = 0;
            } else {
                $dp[$i] = $i - $firstNagetive;
            }
            $negative++;
        }
        $negatives[$i] = $negative;
    }

    $res = $a > 0 ? 1 : 0;
    for ($i = 0; $i < $length; $i++) {
        if ($dp[$i] > $res) {
            $res = $dp[$i];
        }
    }
    var_dump($dp);
    return $res;
}
$nums = [5,-20,-20,-39,-5,0,0,0,36,-32,0,-7,-10,-7,21,20,-12,-34,26,2]; //8
$nums = [-16,0,-14,4,-13,-17,-19,-17,-21,-11,12]; //8
$nums = [0,1,-2,-3,-4]; //8
getMaxLen($nums);

