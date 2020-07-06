<?php
/**
 * Created by PhpStorm.
 * User: xiesonglin
 * Date: 2020/7/6
 * Time: 15:48
 */

/**
 * @param Integer[] $A
 * @return Integer[]
 */
function pancakeSort($A) {
    $res = [];
    $count = count($A);

    for ($i = $count; $i > 1; $i --) {
        $maxIndex = finMax($A, 0, $i - 1);
        $res[] = $maxIndex + 1;
        $res[] = $i;

        $A = array_merge(array_reverse(array_slice($A, 0, $maxIndex + 1)), array_slice($A, $maxIndex + 1));
        $A = array_merge(array_reverse(array_slice($A, 0, $i)), array_slice($A, $i));
    }


    return $res;
}

//二分查找最大值
function finMax($A, $start, $end) {

    if ($start == $end) {
        return $start;
    }
    $mid = floor(($start + $end)/2);
    $left = finMax($A, $start, $mid);
    $right = finMax($A, $mid + 1, $end);

    if ($A[$left] > $A[$right]) {
        return $left;
    } else {
        return $right;
    }
}
//输入：[3,2,4,1]
//输出：[4,2,4,3]

$A = [3,2,4,1];
$res = pancakeSort($A);
var_dump($res);