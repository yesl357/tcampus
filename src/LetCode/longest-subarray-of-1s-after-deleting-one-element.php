<?php
/**
 * Created by PhpStorm.
 * User: xiesonglin
 * Date: 2020/7/6
 * Time: 17:09
 */

/**
 * @param Integer[] $nums
 * @return Integer
 */
function longestSubarray($nums) {
    //res[i]表示从第i个元素开始的最长子数组，只能包含一个0
    $res = [];
    $length = count($nums);
    $max = 0;

    for ($i = 0; $i < $length; $i++) {
        $zeroCount = 0;
        if ($i > 1 && $nums[$i - 1] == 1) {
            $res[$i] = 0;
            continue;
        }
        for ($j = $i; $j < $length; $j++) {
            if ($nums[$j] == 0) {
                $zeroCount ++;
            }
            if ($zeroCount == 2) {
                $res[$i] = $j - $i - 1;
                if ($res[$i] > $max) {
                    $max = $res[$i];
                }
                break;
            }

            if ($j == $length - 1) {
                $res[$i] = $j - $i;
                if ($res[$i] > $max) {
                    $max = $res[$i];
                }
            }
        }
    }

    var_dump($res);
    return $max;
}

$nums = [1,1,0,0,1,1,1,0,1];
longestSubarray($nums);

