<?php


/**
 * @param String[][] $board
 * @return NULL
 */
function solve(&$board) {
    $rLength = count($board);
    $cLength = count($board[0]);
    $mark = [];

    for ($i = 0; $i < $cLength; $i ++) {
        if ($board[0][$i] == 'O' && !isset($mark[0][$i])) {
            dfs(0, $i, $board, $mark);
        }

        if ($board[$rLength - 1][$i] == 'O' && !isset($mark[$rLength - 1][$i])) {
            dfs($rLength - 1, $i, $board, $mark);
        }
    }

    for ($i = 0; $i < $rLength; $i ++) {
        if ($board[$i][0] == 'O' && !isset($mark[$i][0])) {
            dfs($i, 0, $board, $mark);
        }

        if ($board[$i][$cLength - 1] == 'O' && !isset($mark[$i][$cLength - 1])) {
            dfs($i, $cLength - 1, $board, $mark);
        }
    }

    foreach ($board as $x => $item) {
        foreach ($item as $y => $value) {
            if ($value == 'O' && !isset($mark[$x][$y])) {
                $board[$x][$y] = 'X';
            }
        }
    }

    var_dump($mark);
}

function dfs($r, $c, $board, &$mark) {
    if (!isset($board[$r][$c]) || isset($mark[$r][$c])) {
        return;
    }
    $mark[$r][$c] = 1;
    if (isset($board[$r + 1][$c]) && $board[$r + 1][$c] == 'O') {
        dfs($r + 1, $c, $board, $mark);
    }

    if (isset($board[$r - 1][$c]) && $board[$r - 1][$c] == 'O') {
        dfs($r - 1, $c, $board, $mark);
    }

    if (isset($board[$r][$c + 1]) && $board[$r][$c + 1] == 'O') {
        dfs($r, $c + 1, $board, $mark);
    }

    if (isset($board[$r][$c - 1]) && $board[$r][$c - 1] == 'O') {
        dfs($r, $c - 1, $board, $mark);
    }

    return;
}

$board = [["X","X","X","X"],["X","O","O","X"],["X","X","O","X"],["X","O","X","X"]];
solve($board);