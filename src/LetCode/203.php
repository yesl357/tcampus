<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $m
     * @return Integer
     */
    function findLatestStep($arr, $m) {
        $dp = [];
        $n = count($arr);
        $mark = [0, $n + 1];

        if ($n != $m) {
            $dp[$n] = false;
        } else {
            return $n;
        }

        for ($i = $n; $i > 0; $i --) {
            $pos = $this->findPos($mark, $arr[$i - 1], 0, count($mark) - 1);
            if ($i == 5) {
                var_dump($mark);
                var_dump($mark[$pos + 1], $mark[$pos], $arr[$i-1]);die;
            }

            if ($mark[$pos + 1] - $arr[$i - 1] != $m +1 && $arr[$i - 1] - $mark[$pos] != $m+1) {
                array_splice($mark,$pos+1,0, $arr[$i-1]);
                //var_dump($mark);
            } else {
                return $i - 1;
            }
        }

        return -1;
    }

    function findPos($arr, $x, $start, $end) {

        if ($end - $start == 1) {
            return $start;
        } else {
            $mid = floor(($start+$end)/2);
            if ($arr[$mid] > $x) {
                return $this->findPos($arr, $x, $start, $mid);
            } else {
                return $this->findPos($arr, $x, $mid, $end);
            }
        }
    }
}

$arr = [3,5,1,2,4];
$m = 1;

$i = (new Solution())->findLatestStep($arr, $m);
var_dump($i);