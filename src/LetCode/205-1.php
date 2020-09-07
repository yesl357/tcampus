<?php

class Solution {

    public $mark = [];

    /**
     * @param Integer[] $locations
     * @param Integer $start
     * @param Integer $finish
     * @param Integer $fuel
     * @return Integer
     */
    function countRoutes($locations, $start, $finish, $fuel) {
        $start = $locations[$start];
        $end = $locations[$finish];

        sort($locations);
        if ($fuel < abs($end - $start)) {
            return 0;
        }
        $startIndex = array_search($start, $locations);
        $endIndex = array_search($end, $locations);

        // $dp[i][j][k] 表示i -> j 剩余 k油量的方案数,如果location[i] - location[j] > k ,dp(i,j,k) = 0

        $ans = $this->a($startIndex, $endIndex, $fuel, $locations);
        return $ans;
    }

    function a($start, $end, $fuel, $locations) {
        if (isset($this->mark[$start][$end][$fuel])) {
            return $this->mark[$start][$end][$fuel];
        }
        if ($fuel < 0) {
            $this->mark[$start][$end][$fuel] = 0;
            $this->mark[$end][$start][$fuel] = 0;
            return 0;
        }
        if (abs($locations[$start] - $locations[$end]) == $fuel) {
            $this->mark[$start][$end][$fuel] = 1;
            $this->mark[$end][$start][$fuel] = 0;
            return 1;
        }

        $ans = 0;
        if ($start == $end) {
            $ans++;
        }

        $n = count($locations);
        for ($i = 0; $i < $n; $i ++) {
            if ($i == $start) {
                continue;
            }
            $ans += $this->a($i, $end, $fuel - abs($locations[$i] - $locations[$start]), $locations);
        }
        $ans = $ans % 1000000007;
        $this->mark[$start][$end][$fuel] = $ans;
        $this->mark[$end][$start][$fuel] = $ans;
        return $ans;
    }
}

$a = [1,2,3];
$b = 0;
$c = 2;
$d = 40;
$a = (new Solution())->countRoutes($a,$b ,$c, $d);
var_dump($a);
