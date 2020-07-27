<?php

class Solution {

    public $needColored = [];

    public $squares = [];

    /**
     * @param Integer[][] $grid
     * @param Integer $r0
     * @param Integer $c0
     * @param Integer $color
     * @return Integer[][]
     */
    function colorBorder($grid, $r0, $c0, $color) {
        $this->dfs($grid, $r0, $c0);

        foreach ($grid as $r => $items) {
            foreach ($items as $c => $item) {
                if (in_array([$r, $c], $this->needColored)) {
                    $grid[$r][$c] = $color;
                }
            }
        }

        return $grid;
    }

    function dfs($grid, $r, $c) {
        $this->squares[] = [$r, $c];
        $rCount = count($grid);
        $cCount = count($grid[0]);

        //dfs
        if ($r + 1 < $rCount && $grid[$r][$c] == $grid[$r + 1][$c]) {
            if (!in_array([$r+1, $c], $this->squares)) {
                $this->dfs($grid, $r+1, $c);
            }
        } else {
            $this->needColored[] = [$r, $c];
        }


        if ($r - 1 >= 0 && $grid[$r][$c] == $grid[$r - 1][$c]) {
            if (!in_array([$r-1, $c], $this->squares)) {
                $this->dfs($grid, $r-1, $c);
            }
        } else {
            $this->needColored[] = [$r, $c];
        }

        if ($c + 1 < $cCount && $grid[$r][$c] == $grid[$r][$c + 1]) {
            if (!in_array([$r, $c+1], $this->squares)) {
                $this->dfs($grid, $r, $c+1);
            }
        } else {
            $this->needColored[] = [$r, $c];
        }

        if ($c - 1 >= 0 && $grid[$r][$c] == $grid[$r][$c - 1]) {
            if (!in_array([$r, $c-1], $this->squares)) {
                $this->dfs($grid, $r, $c-1);
            }
        } else {
            $this->needColored[] = [$r, $c];
        }
    }
}



$grid = [
    [1,2,2],
    [2,3,2]
];
$r0 = 0;
$c0 = 1;
$color = 3;

(new Solution())->colorBorder($grid, $r0, $c0, $color);
//[[1, 3, 3], [2, 3, 3]]