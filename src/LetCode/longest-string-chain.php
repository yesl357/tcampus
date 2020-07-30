<?php


class Solution {

    /**
     * @param String[] $words
     * @return Integer
     */
    function longestStrChain($words) {
        usort($words, function($item1, $item2) {
            return strlen($item1) > strlen($item2);
        });

        $count = count($words);
        //init thr dp array
        $dp = [];
        for ($i = 0; $i < $count; $i++) {
            $dp[$i] = 1;
        }


        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                $dp[$j] = $this->check($words[$i], $words[$j]) ? max($dp[$i] + 1, $dp[$j]) : $dp[$j];
            }
        }

        return $this->findMax($dp, 0, count($dp) - 1);
    }

    //check word1 is word2's child
    function check($word1, $word2) {
        $diff = 0;
        if (strlen($word1) + 1 != strlen($word2)) {
            return false;
        }
        $index1 = $index2 = 0;

        while ($index1 < strlen($word1) && $index2 < strlen($word2)) {
            if ($word1[$index1] == $word2[$index2]) {
                $index1++;
                $index2++;
            } else {
                $index2++;
                $diff++;
            }

            if ($diff > 1) {
                return false;
            }
        }

        return true;
    }

    //二分查找最大值
    function findMax($arr, $start, $end) {
        if ($start == $end) {
            return $arr[$start];
        }
        $mid = floor(($start + $end) / 2);
        return max($this->findMax($arr, $start, $mid), $this->findMax($arr,$mid + 1, $end));
    }
}

$words = ["a","b","ba","bca","bda","bdca"];
$res = (new Solution())->longestStrChain($words);
echo $res;