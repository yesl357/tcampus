<?php
/**
 * 使括号有效的最少添加
 * 给定一个由 '(' 和 ')' 括号组成的字符串 S，我们需要添加最少的括号（ '(' 或是 ')'，可以在任何位置），以使得到的括号字符串有效。
 * @link https://leetcode-cn.com/problems/minimum-add-to-make-parentheses-valid/
 */

/**
 * @param String $S
 * @return Integer
 */
function minAddToMakeValid($S) {
    $stack = [];
    if ($S == '') {
        return 0;
    }
    $arr = str_split($S);
    foreach ($arr as $str) {
        if (end($stack) == '(' && $str == ')') {
            array_pop($stack);
        } else {
            array_push($stack, $str);
        }
    }


    return count($stack);
}

$s = '';

echo minAddToMakeValid($s);