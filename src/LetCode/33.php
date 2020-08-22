<?php

class Solution {

    public $res = false;
    public $mark = [];

    function containsCycle($grid) {
        $m = count($grid);
        $n = count($grid[0]);
        $copy = $grid;

        for ($i = 0; $i < $m ; $i ++) {
            for ($j = 0; $j < $n; $j ++) {
                if ($grid[$i][$j] !== '0' && !isset($this->mark[$i][$j])) {
                    $this->dfs($grid, $i, $j, $grid[$i][$j], 1, -1, -1);
                    if ($this->res) {
                        return true;
                    }
                }
            }
        }

        return $this->res;
    }


    function dfs($grid, $x, $y, $v, $num, $lastx, $lasty) {

        $this->mark[$x][$y] = 1;

        if (isset($grid[$x + 1][$y]) && $grid[$x + 1][$y] == $v  && ($x + 1 != $lastx || $y != $lasty)) {
            if (isset($this->mark[$x + 1][$y])) {
                $this->res = true;
                return;
            }
            $this->dfs($grid, $x + 1, $y, $v, $num + 1, $x, $y);
        }

        if (isset($grid[$x - 1][$y]) && $grid[$x - 1][$y] == $v && ($x - 1 != $lastx || $y != $lasty)) {
            if (isset($this->mark[$x - 1][$y])) {
                $this->res = true;
                return;
            }
            $this->dfs($grid, $x - 1, $y, $v, $num + 1, $x, $y);
        }

        if (isset($grid[$x][$y - 1]) && $grid[$x ][$y - 1] == $v  && ($x != $lastx || $y -1 != $lasty)) {
            if (isset($this->mark[$x][$y -1])) {
                $this->res = true;
                return;
            }
            $this->dfs($grid, $x, $y - 1, $v, $num + 1, $x, $y);
        }

        if (isset($grid[$x][$y + 1]) && $grid[$x][$y + 1] == $v  && ($x != $lastx || $y+1 != $lasty)) {
            if (isset($this->mark[$x][$y + 1])) {
                $this->res = true;
                return;
            }
            $this->dfs($grid, $x, $y + 1, $v, $num + 1, $x, $y);
        }
        return;
    }
}