<?php

class Solution {

    public $res = [];

    /**
     * @param Integer $n
     * @return String[][]
     */
    function solveNQueens($n) {
        $grid = array_fill(0, $n, array_fill(0, $n, '.'));
        $this->back($n, $grid, 0);

        return $this->res;
    }

    //回溯
    function back($n, $grid, $row) {
        if ($n == $row) {
            $tmp = [];
            foreach ($grid as $item) {
                $tmp[] = implode('', $item);
            }
            $this->res[] = $tmp;
            return;
        }

        for ($i = 0; $i < $n; $i++) {
            if (!$this->check($grid, $row, $i)) {
                continue;
            }
            $grid[$row][$i] = 'Q';
            $this->back($n, $grid, $row + 1);
            $grid[$row][$i] = '.';
        }
    }

    function check($grid, $x, $y) {
        foreach ($grid as $r => $item) {
            foreach ($item as $c => $value) {
                if ($value == 'Q') {
                    if ($r == $x || $c == $y || abs($r - $x) == abs($c - $y)) {
                        return false;
                    }
                }
            }
        }


        return true;
    }
}

//["..Q.", "Q...", "...Q", ".Q.."]

$a = (new Solution())->solveNQueens(4);

var_dump($a);