<?php


class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) {
        $this->val = $value;
    }
}

class Solution {

    public $has = false;

    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Boolean
     */
    function hasPathSum($root, $sum) {
        $this->dfs($root->left, $root->val, $sum);
        $this->dfs($root->left, $root->val, $sum);

        return $this->has;
    }

    function dfs($tree, $distance, $sum) {
        if ($tree->left == null && $tree->right == null) {
            if ($distance + $tree->val == $sum) {
                $this->has = true;
                return;
            }
        }

        if ($tree->left != null) {
            $this->dfs($tree->left, $distance + $tree->val, $sum);
        }

        if ($tree->right != null) {
            $this->dfs($tree->right, $distance + $tree->right, $sum);
        }
    }
}


//(new Solution())->hasPathSum();


//init 将数组 转化为 tree
