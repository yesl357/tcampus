<?php
/**
 * Created by PhpStorm.
 * User: xiesonglin
 * Date: 2020/7/6
 * Time: 15:20
 */

/**
 * @param Integer[] $nums
 * @return Integer
 */
function findMaxLength($nums) {
    $count = count($nums);
    $sum = [];
    for ($i = 0; $i <= $count; $i++) {
        if ($i > 0) {
            $sum[$i] = $sum[$i - 1] + ($nums[$i - 1] == 0 ? -1 : 1);
        } else {
            $sum[$i] = 0;
        }
    }

    $tmp = [];
    foreach ($sum as $i => $num) {
        $tmp[$num][] = $i;
    }

    $res = 0;
    foreach ($tmp as $key => $item) {
        if ($item[count($item) - 1] - $item[0] > $res) {
            $res = $item[count($item) - 1] - $item[0];
        }
    }

    return $res;
}


findMaxLength([]);