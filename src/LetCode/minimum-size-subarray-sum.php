<?php
/**
 * 给定一个含有 n 个正整数的数组和一个正整数 s ，找出该数组中满足其和 ≥ s 的长度最小的连续子数组，并返回其长度。如果不存在符合条件的连续子数组，返回 0。
 */


/**
 * @param Integer $s
 * @param Integer[] $nums
 * @return Integer
 */
function minSubArrayLen($s, $nums) {
    if (array_sum($nums) < $s) {
        return 0;
    }

    $answer = [];
    $count = count($nums);

    $sum = 0;
    $indexes = [];
    $sums = [];
    for ($j = 0; $j < $count; $j ++) {
        $sum += $nums[$j];
        if ($sum >= $s) {
            $answer[0] = $j + 1;
            $sums[0] = $sum;
            $indexes[0] = $j;
            break;
        }
    }

    for ($k = 1; $k < $count; $k ++) {
        if (!isset($sums[$k - 1])) {
            break;
        }
        $sum = $sums[$k - 1] - $nums[$k - 1];
        if ($sum >= $s) {
            $answer[$k] = $indexes[$k - 1] - $k + 1;
            $sums[$k] = $sum;
            $indexes[$k] = $indexes[$k - 1];
            continue;
        }
        for ($v = $indexes[$k - 1] + 1; $v < $count; $v++) {
            $sum += $nums[$v];
            if ($sum >= $s) {
                $answer[$k] = $v - $k + 1;
                $sums[$k] = $sum;
                $indexes[$k] = $v;
                break;
            }
        }
    }

    sort($answer);
    return $answer[0];
}

$nums = [12,28,83,4,25,26,25,2,25,25,25,12];
$s = 213;

minSubArrayLen($s, $nums);