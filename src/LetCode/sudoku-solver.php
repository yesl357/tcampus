<?php

class Solution {

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solveSudoku(&$board) {
        //冲突
        $confr = [];
        $confc = [];
        $confs = [];

        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if ($board[$i][$j] != '.') {
                    $confr[$i][$board[$i][$j]] = true;
                    $confc[$j][$board[$i][$j]] = true;
                    $confs[floor($i/3)][floor($j/3)][$board[$i][$j]] = true;
                }
            }
        }

        $this->resolve($board, $confr, $confc, $confs, 0, 0);
        var_dump($board);
    }

    function resolve(&$board, $confr, $confc, $confs, $r, $c) {
        //判断是否完成
        if ($c == 9) {
            $c = 0;
            $r ++;
            if ($r == 9) {
                return true;
            }
        }

        if ($board[$r][$c] == '.') {
            for ($i = 1; $i <= 9; $i ++) {
                //如果存在冲突！
                if ((!isset($confr[$r][$i]) || !$confr[$r][$i]) &&
                    (!isset($confc[$c][$i]) || !$confc[$c][$i]) &&
                    (!isset($confs[floor($r/3)][floor($c/3)][$i]) || !$confs[floor($r/3)][floor($c/3)][$i])
                ) {
                    $board[$r][$c] = $i;
                    $confr[$r][$i] = true;
                    $confc[$c][$i] = true;
                    $confs[floor($r/3)][floor($c/3)][$i] = true;

                    //下一步
                    $next = $this->resolve($board, $confr, $confc, $confs, $r, $c + 1);

                    //如果无解，则回溯
                    if ($next) {
                        return true;
                    } else {
                        $board[$r][$c] = '.';
                        $confr[$r][$i] = false;
                        $confc[$c][$i] = false;
                        $confs[floor($r/3)][floor($c/3)][$i] = false;
                    }
                }
            }
        } else {
            return $this->resolve($board, $confr, $confc, $confs, $r, $c + 1);
        }

        return false;
    }

}

$board = [
    ["5","3",".",".","7",".",".",".","."],
    ["6",".",".","1","9","5",".",".","."],
    [".","9","8",".",".",".",".","6","."],
    ["8",".",".",".","6",".",".",".","3"],
    ["4",".",".","8",".","3",".",".","1"],
    ["7",".",".",".","2",".",".",".","6"],
    [".","6",".",".",".",".","2","8","."],
    [".",".",".","4","1","9",".",".","5"],
    [".",".",".",".","8",".",".","7","9"]
];

(new Solution())->solveSudoku($board);