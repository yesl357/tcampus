<?php

class Solution {
    public $visitors = [];

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function islandPerimeter($grid) {
        $res = 0;
        for ($i = 0; $i < count($grid); $i ++) {
            for ($j = 0; $j < count($grid[0]); $j++) {
                if ($grid[$i][$j] == 1) {
                    $this->dfs($grid, $i, $j, $res);
                }
            }
        }

        var_dump($res);die;
        return $res;
    }

    function dfs($grid, $r, $c, &$res) {
        if (in_array([$r, $c], $this->visitors)) {
            return;
        }
        $this->visitors[] = [$r, $c];
        //左
        if ($c - 1 >= 0 && $grid[$r][$c - 1] == 1) {
            $this->dfs($grid, $r, $c - 1,$res);
        } else {
            $res ++;
        }
        //右
        if ($c + 1 < count($grid[0]) && $grid[$r][$c + 1] == 1) {
            $this->dfs($grid, $r, $c + 1,$res);
        } else {
            $res ++;
        }

        //上
        if ($r - 1 >= 0 && $grid[$r - 1][$c] == 1) {
            $this->dfs($grid, $r - 1, $c,$res);
        } else {
            $res ++;
        }
        //下
        if ($r + 1 < count($grid) && $grid[$r + 1][$c] == 1) {
            $this->dfs($grid, $r + 1, $c,$res);
        } else {
            $res ++;
        }
    }
}




$grid = [
    [1,1]
];

(new Solution())->islandPerimeter($grid);