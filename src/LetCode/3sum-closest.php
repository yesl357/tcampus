<?php
/**
 * 给定一个包括 n 个整数的数组 nums 和 一个目标值 target。找出 nums 中的三个整数，使得它们的和与 target 最接近。返回这三个数的和。假定每组输入只存在唯一答案
 * @link https://leetcode-cn.com/problems/3sum-closest/
 */

/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer
 */
function threeSumClosest($nums, $target) {
    $count = count($nums);
    sort($nums);

    //初始化结果
    $result = $nums[0] + $nums[1] + $nums[2];
    for ($i = 0; $i < $count; $i++) {
        $j = $i + 1;
        $k = $count - 1;
        while ($j < $k) {
            $abc = $nums[$i] + $nums[$j] + $nums[$k];

            if (abs($abc - $target) < abs($result - $target)) {
                $result = $abc;
            }
            if ($abc > $target) {
                $k --;
            } else {
                $j ++;
            }
        }
    }

    return $result;
}

$nums = [-1,2,1,-4];
$target = 1;
threeSumClosest($nums, $target);