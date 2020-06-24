<?php
/**
 * 单词拆分
 * @link  https://leetcode-cn.com/problems/word-break/
 */

/**
 * 这个方法的想法是对于给定的字符串（ss）可以被拆分成子问题 s1s1 和 s2s2 。如果这些子问题都可以独立地被拆分成符合要求的子问题，那么整个问题 ss 也可以满足。也就是，如果 "\text{catsanddog}catsanddog" 可以拆分成两个子字符串 "\text{catsand}catsand" 和 "\text{dog}dog" 。子问题 "\text{catsand}catsand" 可以进一步拆分成 "\text{cats}cats" 和 "\text{and}and" ，这两个独立的部分都是字典的一部分，所以 "\text{catsand}catsand" 满足题意条件，再往前， "\text{catsand}catsand" 和 "\text{dog}dog" 也分别满足条件，所以整个字符串 "\text{catsanddog}catsanddog" 也满足条件。
 * @param String $s
 * @param String[] $wordDict
 * @return Boolean
 */
function wordBreak($s, $wordDict) {
    $dp = [];
    $count =  strlen($s);
    for ($i = 0; $i <= $count; $i++) {
        $dp[$i] = false;
    }
    $dp[0] = true;

    for ($i = 1; $i <= $count; $i++) {
        for ($j = 0; $j < $i; $j++) {
            $str = substr($s, $j, $i - $j);
            if ($dp[$j] && in_array($str, $wordDict)) {
                $dp[$i] = true;
                break;
            }
        }
    }

    return $dp[$count];
}


$s = 'leetCode';
$wordDict = ['leet', 'Code'];

wordBreak($s, $wordDict);