<?php
//算法导论第4章，分治策略-39页
//最大子数组 [100, 113, 110, 85, 105, 102, 86, 63, 81, 101, 94, 106, 101, 79, 94, 90, 97]

function findMaxCrossingSubArray($a, $low, $mid, $height) {
    //左侧数组 $low->$mid,右侧$mid+1->$height
    $leftMaxSum = 0;
    $leftMaxIndex = $mid;
    $sum = 0;
    for ($i = $mid; $i >= $low; $i --) {
        $sum += $a[$i];
        if ($sum > $leftMaxSum) {
            $leftMaxSum = $sum;
            $leftMaxIndex = $i;
        }
    }

    $rightMaxSum = 0;
    $rightMaxIndex = $mid + 1;
    $sum = 0;
    for ($j = $mid + 1; $j <= $height; $j ++) {
        $sum += $a[$j];
        if ($sum > $rightMaxSum) {
            $rightMaxSum = $sum;
            $rightMaxIndex = $j;
        }
    }


    return [$leftMaxIndex, $rightMaxIndex, $leftMaxSum + $rightMaxSum];
}

function findMaxSubArray($a, $low, $height) {
    if ($low >= $height) {
        return [$low, $height, $a[$low]];
    }

    $mid = floor(($low + $height) / 2);


    list($leftLow, $leftHeight, $leftMaxSum) = findMaxSubArray($a, $low, $mid);
    list($rightLow, $rightHeight, $rightMaxSum) = findMaxSubArray($a, $mid + 1, $height);
    list($crossLow, $crossHeight, $crossMaxSum) = findMaxCrossingSubArray($a, $low, $mid, $height);


    if ($leftMaxSum >= $rightMaxSum && $leftMaxSum >= $crossMaxSum) {
        return [$leftLow, $leftHeight, $leftMaxSum];
    } elseif ($rightMaxSum >= $leftMaxSum && $rightMaxSum >= $crossMaxSum) {
        return [$rightLow, $rightHeight, $rightMaxSum];
    } else {
        return [$crossLow, $crossHeight, $crossMaxSum];
    }
}

$a = [100, 113, 110, 85, 105, 102, 86, 63, 81, 101, 94, 106, 101, 79, 94, 90, 97];
$b = [];
foreach ($a as $key => $value) {
    if ($key == 0) {
        $b[] = 0;
    } else {
        $b[] = $a[$key] - $a[$key - 1];
    }
}
$low = 0;
$height = count($a) - 1;

var_dump(implode(' ', $a));
var_dump(implode(' ', $b));
var_dump(findMaxSubArray($b, $low, $height));