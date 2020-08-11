<?php

/**
 * @param Integer[] $stones
 * @return Integer
 */
function lastStoneWeightII($stones) {
    $totalWeight = 0;
    foreach ($stones as $stone) {
        $totalWeight += $stone;
    }
    $stonesCount = count($stones);
    $v = floor($totalWeight / 2);
    $dp = [];
//    $dp[-1][]
    //状态转移方程： dp[i][j] = max(dp[i - 1][j], dp[i - 1][j - w[i]] + w[i])

    for ($i = 0; $i < $stonesCount; $i ++) {
        for ($j = 0; $j < $v; $j ++) {
            if ($stones[$i] > $j + 1) {
                $dp[$i][$j] = isset($dp[$i - 1][$j]) ? $dp[$i - 1][$j] : 0;
            } else {
                $a = isset($dp[$i - 1][$j]) ? $dp[$i - 1][$j] : 0;
                $b = isset($dp[$i - 1][$j - $stones[$i]]) ? $dp[$i - 1][$j - $stones[$i]] + $stones[$i] : $stones[$i];
                $dp[$i][$j] = max($a, $b);
            }
        }
    }

    return $totalWeight - 2 * $dp[$stonesCount - 1][$v - 1];
}

$stones = [2,7,4,1,8,1];
echo lastStoneWeightII($stones);



function removeDuplicates($S) {
    while (true) {
        $length = strlen($S);
        $flag = false;
        for ($i = 1; $i < $length; $i ++) {
            if ($S[$i] == $S[$i - 1]) {
                $flag = true;
                $S = substr($S, 0, $i - 1).substr($S, $i + 1);
                break;
            }
        }

        if (!$flag) {
            break;
        }
    }

    return $S;
}