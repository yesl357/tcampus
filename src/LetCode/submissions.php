<?php
class Solution {

    /**
     * @param String[] $words
     * @return String
     */
    function longestWord($words) {
        $res = '';
//        var_dump($this->check("ininjkkkknlkllkklni",$words));die;
        foreach ($words as $word) {
            if ($this->check($word, $words)) {
                if (strlen($word) > strlen($res)) {
                    $res = $word;
                } elseif (strlen($word) == strlen($res)) {
                    if (strcmp($word, $res) < 0) {
                        $res = $word;
                    }
                }
            }
        }

        return $res;
    }

    function check($word, $words) {
        $length = strlen($word);

        for ($i = 1; $i <= $length - 1; $i ++) {

            $left = substr($word, 0, $i);
            $right = substr($word, $i);
//            if ($word == 'ininjkkkknlkllkklni' && $i == 8) {
//                var_dump($word, in_array($left, $words));die;
//            }

            if (in_array($left, $words)) {
                if (in_array($right, $words)) {
                    return true;
                } else {
                    if ($this->check($right, $words)) {
                        return true;
                    } else {
                        continue;
                    }
                }
            } else {
                continue;
            }
        }

        return false;
    }
}

$words = ["ikjkikkki","ikjkikkknlkllkklni","lkliki","ininjkkkk","ikjkikkk","i","ininjkkkknlkllkklni","nlkllkklni","j"];
$res = (new Solution())->longestWord($words);
var_dump($res);

class Solution2 {

    public $stack;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minDepth($root) {
        array_push($this->stack, [$root,1]);
        var_dump($root);
        while (!empty($this->stack)) {
            $tree = array_shift($this->stack);

            $res = $this->bfs($tree[0], $tree[1]);
            if ($res !== false) {
                return $res;
            }
        }

        return 1111;
    }

    function bfs($tree, $level) {
        if ($tree->left === null && $tree->right === null) {
            return $level;
        }

        if ($tree->left !== null) {
            array_push($this->stack, [$tree->left, $level + 1]);
        }

        if ($tree->right !== null) {
            array_push($this->stack, [$tree->right, $level + 1]);
        }

        return false;
    }
}